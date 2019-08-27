---
title:  findLastIndex
tags: array,beginner
---

Returns the index of the last element for which the provided function returns a truthy value.

Use `array_keys()` and `array_filter()` to remove elements for which `$func` returns falsy values, `array_pop()` to get the last one.

```php
function findLastIndex($items, $func)
{
  $keys = array_keys(array_filter($items, $func));

  return array_pop($keys);
}
```

```php
findLastIndex([1, 2, 3, 4], function ($n) {
  return ($n % 2) === 1;
});
// 2
```
