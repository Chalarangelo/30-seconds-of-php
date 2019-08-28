---
title:  rotate
tags: array,beginner
---

Rotates the array (in left direction) by the number of shifts.

Given the `$shift` index, merge the array values after `$shift` with the values before `$shift`.

```php
function rotate($array, $shift = 1)
{
  for ($i = 0; $i < $shift; $i++) {
    array_push($array, array_shift($array));
  }

  return $array;
}
```

```php
rotate([1, 3, 5, 2, 4]); // [3, 5, 2, 4, 1]
rotate([1, 3, 5, 2, 4], 2); // [5, 2, 4, 1, 3]
```
