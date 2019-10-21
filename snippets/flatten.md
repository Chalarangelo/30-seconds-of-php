---
title:  flatten
tags: array,intermediate
---

Flattens an array up to the one level depth.

Use `array_push()`, splat operator and `array_values()` to flatten the array.

```php
function flatten($items)
{
  $result = [];
  foreach ($items as $item) {
    if (!is_array($item)) {
      $result[] = $item;
    } else {
      array_push($result, ...array_values($item));
    }
  }

  return $result;
}
```

```php
flatten([1, [2], 3, 4]); // [1, 2, 3, 4]
```
