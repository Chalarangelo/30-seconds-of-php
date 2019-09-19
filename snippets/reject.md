---
title:  reject
tags: array,beginner
---

Filters the collection using the given callback.

Use `array_values()`, `array_diff()` and `array_filter()` to filter `$items` based on `$func`.

```php
function reject($items, $func)
{
  return array_values(array_diff($items, array_filter($items, $func)));
}
```

```php
reject(['Apple', 'Pear', 'Kiwi', 'Banana'], function ($item) {
  return strlen($item) > 4;
}); // ['Pear', 'Kiwi']
```
