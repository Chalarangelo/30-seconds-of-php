---
title:  slugify
tags: string,intermediate
---

Converts a string to a slug which is URL friendly.

Uses `preg_replace()` to replace invalid chars with dashes, `iconv()` to convert the text to ASCII which is URL friendly, `strtolower()` as slugs should be lower case and `trim()` to do the cleanup.

```php
function slugify($text)
{
    // replace non alpha-numeric chars by dash
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate, requires ext-iconv
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // remove duplicate dash
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);
    
    // cleanup
    $text = trim($text, " \t\n\r\0\x0B-");

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}
```

```php
slugify('Hello World'); // 'hello-world'
```
