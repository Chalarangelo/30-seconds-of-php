---
title:  palindrome
tags: string,beginner
---

Returns `true` if the given string is a palindrome, `false` otherwise.

Check if the value of `strrev($string)` is equal to the passed `$string`.

```php
function palindrome($string)
{
  return strrev($string) === (string) $string;
}
```

```php
palindrome('racecar'); // true
palindrome(2221222); // true
```
