---
title:  hasDuplicates
tags: array,beginner
---

Checks a flat list for duplicate values, returning `true` if duplicate values exists and `false` if values are all unique.

Use `count()` and `array_unique()` to check `$items` for duplicate values.

```php
function hasDuplicates($items)
{
  return count($items) > count(array_unique($items));
}
```

```php
hasDuplicates([1, 2, 3, 4, 5, 5]); // true
```
