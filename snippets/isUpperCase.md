---
title:  isUpperCase
tags: string,beginner
---

Returns `true` if the given string is upper case, false otherwise.

Convert the given string to upper case, using `strtoupper` and compare it to the original.

```php
function isUpperCase($string)
{
  return $string === strtoupper($string);
}
```

```php
isUpperCase('MORNING SHOWS THE DAY!'); // true
isUpperCase('qUick Fox'); // false
```
