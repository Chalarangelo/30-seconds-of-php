---
title:  countVowels
tags: string,regexp,beginner
---

Returns number of vowels in the provided string.

Use a regular expression to count the number of vowels (`a`, `e`, `i`, `o` and `u`a) in a string.

```php
function countVowels($string)
{
  preg_match_all('/[aeiou]/i', $string, $matches);

  return count($matches[0]);
}
```

```php
countVowels('sampleInput'); // 4
```
