---
title:  pull
tags: array,beginner
---
Mutates the original array to filter out the values specified.

```php
function pull(&$items, ...$params)
{
  $items = array_values(array_diff($items, $params));
  return $items;
}
```

```php
$items = ['a', 'b', 'c', 'a', 'b', 'c'];
pull($items, 'a', 'c'); // $items will be ['b', 'b']
```
