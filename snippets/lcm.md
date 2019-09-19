---
title:  lcm
tags: math,intermediate
---

Returns the least common multiple of two or more numbers.

Use the greatest common divisor (GCD) formula and the fact that `lcm(x,y) = x * y / gcd(x,y)` to determine the least common multiple. 
The GCD formula uses recursion.

```php
function lcm(...$numbers)
{
  $ans = $numbers[0];
  for ($i = 1, $max = count($numbers); $i < $max; $i++) {
    $ans = (($numbers[$i] * $ans) / gcd($numbers[$i], $ans));
  }

  return $ans;
}
```

```php
lcm(12, 7); // 84
lcm(1, 3, 4, 5); // 60
```
