---
title:  isAnagram
tags: string,beginner
---

Compare two strings and returns `true` if both strings are anagram, `false` otherwise.

Use `count_chars()` to compare `$string1` and `$string2`.

```php
function isAnagram($string1, $string2)
{
  return count_chars($string1, 1) === count_chars($string2, 1);
}
```

```php
isAnagram('act', 'cat'); // true
```
