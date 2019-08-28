---
title:  maxN
tags: math,array,intermediate
---

Returns the maximum value from the provided array.

Use `array_filter()` and `max()` to find the maximum value in an array.

```php
function maxN($numbers)
{
  $maxValue = max($numbers);
  $maxValueArray = array_filter($numbers, function ($value) use ($maxValue) {
    return $maxValue === $value;
  });

  return count($maxValueArray);
}
```

```php
maxN([1, 2, 3, 4, 5, 5]); // 2
maxN([1, 2, 3, 4, 5]); // 1
```
