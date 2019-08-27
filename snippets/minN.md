---
title:  minN
tags: math,array,intermediate
---

Returns the minimum value from the provided array.

Use `array_filter()` and `min()` to find the minimum value in an array.

```php
function minN($numbers)
{
  $minValue = min($numbers);
  $minValueArray = array_filter($numbers, function ($value) use ($minValue) {
    return $minValue === $value;
  });

  return count($minValueArray);
}
```

```php
minN([1, 1, 2, 3, 4, 5, 5]); // 2
minN([1, 2, 3, 4, 5]); // 1
```
