---
title:  endsWith
tags: string,beginner
---

Checks if a string is ends with a given substring.

Use `strrpos()` in combination with `strlen` to find the position of `$needle` in `$haystack`.

```php
function endsWith($haystack, $needle)
{
  return strrpos($haystack, $needle) === (strlen($haystack) - strlen($needle));
}
```

```php
endsWith('Hi, this is me', 'me'); // true
```
