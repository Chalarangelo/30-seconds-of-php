---
title:  collapse
tags: array,beginner
---

Collapse a list of arrays into a single.

Use `array_reduce()` to reduce each item into a single array, if the item
is a array, merge the array with final item, if not, adds the item in a array and merge too.

```php
function collapse($array)
{
  return array_reduce($array, function ($carry, $item) {
    $itemToAdd = is_array($item) ? $item : [$item];
    
    return array_merge($carry, $itemToAdd);
  }, []);
}
```

```php
collapse([[1, 2, 3], [4, 5, 6], [7, 8, 9]]);
// [1, 2, 3, 4, 5, 6, 7, 8, 9]
```
