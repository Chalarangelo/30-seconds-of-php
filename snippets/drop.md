---
title:  drop
tags: array,beginner
---

Returns a new array with `$n` elements removed from the left.

Use `array_slice()` to remove `$n` elements from the left.
Omit the second argument, `$n`, to only remove one element.

```php
function drop($items, $n = 1)
{
  return array_slice($items, $n);
}
```

```php
drop([1, 2, 3]); // [2,3]
drop([1, 2, 3], 2); // [3]
```
