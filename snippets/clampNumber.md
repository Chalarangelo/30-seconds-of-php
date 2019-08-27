---
title:  clampNumber
tags: math,beginner
---

Clamps `$num` within the inclusive range specified by the boundary values `$a` and `$b`.

If `$num` falls within the range, return `$num`. 
Otherwise, return the nearest number in the range, using `min()` and `max()`.

```php
function clampNumber($num, $a, $b)
{
  return max(min($num, max($a, $b)), min($a, $b));
}
```

```php
clampNumber(2, 3, 5); // 3
clampNumber(1, -1, -5); // -1
```
