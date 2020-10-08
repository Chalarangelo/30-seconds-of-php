---
title: Sum of cubes of the first n natural numbers
tags: Math, Beginner
---

Returns the Sum of cubes of first n natural numbers

- Pass a value n to sum_of_cubes
- Returns the sum of cubes of first n natural numbers by using a for loop.

```
function sum_of_cubes($val)
{
   $init_sum = 0;
   for ($x = 1; $x <= $val; $x++)
      $init_sum += $x * $x * $x;
   return $init_sum;
}
```

```
echo sum_of_cubes(8); //1296
```
