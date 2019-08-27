---
title:  all
tags: array,beginner
---

Returns `true` if the provided function returns `true` for all elements of an array, `false` otherwise.

```php
function all($items, $func)
{
  return count(array_filter($items, $func)) === count($items);
}
```

```php
all([2, 3, 4, 5], function ($item) {
  return $item > 1;
}); // true
```
