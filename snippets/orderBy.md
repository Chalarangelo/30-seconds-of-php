---
title:  orderBy
tags: array,advanced
---

Sorts a collection of arrays or objects by key.

Uses `sort()` on the provided array to sort the array based on `$order` and `$attr`.

```php
function orderBy($items, $attr, $order)
{
  $sortedItems = [];
  foreach ($items as $item) {
    $key = is_object($item) ? $item->{$attr} : $item[$attr];
    $sortedItems[$key] = $item;
  }
  if ($order === 'desc') {
    krsort($sortedItems);
  } else {
    ksort($sortedItems);
  }

  return array_values($sortedItems);
}
```

```php
orderBy(
  [
    ['id' => 2, 'name' => 'Joy'],
    ['id' => 3, 'name' => 'Khaja'],
    ['id' => 1, 'name' => 'Raja']
  ],
  'id',
  'desc'
); // [['id' => 3, 'name' => 'Khaja'], ['id' => 2, 'name' => 'Joy'], ['id' => 1, 'name' => 'Raja']]
```
