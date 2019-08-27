---
title:  fibonacci
tags: math,intermediate
---

Generates an array, containing the Fibonacci sequence, up until the nth term.

Create an empty array, initializing the first two values (`0` and `1`).
Loop from 2 through `$n` and add values into the array, using the sum of the last two values.

```php
function fibonacci($n)
{
  $sequence = [0, 1];

  for ($i = 2; $i < $n; $i++) {
    $sequence[$i] = $sequence[$i-1] + $sequence[$i-2];
  }

  return $sequence;
}
```

```php
fibonacci(6); // [0, 1, 1, 2, 3, 5]
```
