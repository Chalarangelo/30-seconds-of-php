---
title:  any
tags: array,beginner
---

Returns `true` if the provided function returns `true` for at least one element of an array, `false` otherwise.

Use `array_filter()` and `count()` to check if `$func` returns `true` for any of the elements in `$items`.

```php
function any($items, $func)
{
  return count(array_filter($items, $func)) > 0;
}
```

```php
any([1, 2, 3, 4], function ($item) {
  return $item < 2;
}); // true
```
