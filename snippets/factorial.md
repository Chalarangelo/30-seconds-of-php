---
title:  factorial
tags: math,recursion,beginner
---

Calculates the factorial of a number.

Use recursion.
If `$n` is less then or equal to `1`, return `1`.
Otherwise, return the product of `$n` and the factorial of `$n -1`.

```php
function factorial($n)
{
  if ($n <= 1) {
    return 1;
  }

  return $n * factorial($n - 1);
}
```

```php
factorial(6); // 720
```
