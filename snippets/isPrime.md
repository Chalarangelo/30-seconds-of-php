---
title:  isPrime
tags: math,beginner
---

Checks if the provided integer is a prime number.

Check numbers from `2` to the square root of the given number. 
Return `false` if any of them divides the given number, else return `true`, unless the number is less than `2`.

```php
function isPrime($number)
{
  $boundary = floor(sqrt($number));
  for ($i = 2; $i <= $boundary; $i++) {
    if ($number % $i === 0) {
      return false;
    }
  }

  return $number >= 2;
}
```

```php
isPrime(3); // true
```
