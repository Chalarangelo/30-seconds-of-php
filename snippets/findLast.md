---
title:  findLast
tags: array,beginner
---

Returns the last element for which the provided function returns a truthy value.

Use `array_filter()` to remove elements for which `$func` returns falsy values, `array_pop()` to get the last one.

```php
function findLast($items, $func)
{
  $filteredItems = array_filter($items, $func);

  return array_pop($filteredItems);
}
```

```php
findLast([1, 2, 3, 4], function ($n) {
  return ($n % 2) === 1;
});
// 3
```
