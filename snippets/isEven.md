---
title:  isEven
tags: math,beginner
---

Returns `true` if the given number is even, `false` otherwise.

Checks whether a number is odd or even using the modulo (`%`) operator. 
Returns `true` if the number is even, `false` if the number is odd.

```php
function isEven($number)
{
  return ($number % 2) === 0;
}
```

```php
isEven(4); // true
```
