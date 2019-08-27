---
title:  without
tags: array,beginner
---

Filters out the elements of an array, that have one of the specified values.

Use `array_values()` and `array_diff()` to remove any values in `$params` from `$items`.

```php
function without($items, ...$params)
{
  return array_values(array_diff($items, $params));
}
```

```php
without([2, 1, 2, 3], 1, 2); // [3]
```
