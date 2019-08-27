---
title:  hasDuplicates
tags: array,beginner
---
Checks a flat list for duplicate values. Returns `true` if duplicate values exists and `false` if values are all unique.

```php
function hasDuplicates($items)
{
  return count($items) > count(array_unique($items));
}
```

```php
hasDuplicates([1, 2, 3, 4, 5, 5]); // true
```
