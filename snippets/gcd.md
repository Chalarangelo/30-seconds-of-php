---
title:  gcd
tags: math,recursion,intermediate
---

Calculates the greatest common divisor between two or more numbers.

Use recursion.
Use `array_reduce()` with the `gcd` function to appy to all elements in the `$numbers` list.
Base case is when `y` equals `0`. In this case, return `x`. 
Otherwise, return the gcd of `y` and the remainder of the division `x/y`.

```php
function gcd(...$numbers)
{
  if (count($numbers) > 2) {
    return array_reduce($numbers, 'gcd');
  }

  $r = $numbers[0] % $numbers[1];
  return $r === 0 ? abs($numbers[1]) : gcd($numbers[1], $r);
}
```

```php
gcd(8, 36); // 4
gcd(12, 8, 32); // 4
```
