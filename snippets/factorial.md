---
title:  factorial
tags: math,recursion,beginner
---
Calculates the factorial of a number.

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
