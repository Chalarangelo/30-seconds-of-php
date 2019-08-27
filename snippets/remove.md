---
title:  remove
tags: array,beginner
---

Removes elements from an array for which the given function returns `false`.

Use `array_filter()` to find array elements that return truthy values and `array_diff_keys()` to remove the elements not contained in `$filtered`.

```php
function remove($items, $func)
{
  $filtered = array_filter($items, $func);

  return array_diff_key($items, $filtered);
}
```

```php
remove([1, 2, 3, 4], function ($n) {
  return ($n % 2) === 0;
});
// [0 => 1, 2 => 3]
```
