---
title:  slugify
tags: string,intermediate
---

Converts a string to a URL-friendly slug.

Uses `preg_replace()` to replace invalid chars with dashes, `iconv()` to convert the text to ASCII, `strtolower()` and `trim()` to convert to lowercase and remove extra whitespace.

```php
function slugify($text) {
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
  $text = preg_replace('~[^-\w]+~', '', $text);
  $text = preg_replace('~-+~', '-', $text);
  $text = strtolower($text);
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
