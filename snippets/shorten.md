---
title: shorten
tags: string,beginner
---

Returns a shortened string.

Use `mb_strlen()`, `mb_substr()` and `rtrim()` to shorten a string to a give number of characters.

```php
function shorten($input, $length = 100, $end = '...')
{
  if (mb_strlen($input) <= $length) {
    return $input;
  }

  return rtrim(mb_substr($input, 0, $length, 'UTF-8')) . $end;
}
```

```php
shorten('The quick brown fox jumped over the lazy dog', 15); // The quick brown...
```