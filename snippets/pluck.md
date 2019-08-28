---
title:  pluck
tags: array,beginner
---

Retrieves all of the values for a given key.

Use `array_map()` to map each object in the `$items` array to the provided `$key`.

```php
function pluck($items, $key)
{
  return array_map( function($item) use ($key) {
    return is_object($item) ? $item->$key : $item[$key];
  }, $items);
}
```

```php
pluck([
  ['product_id' => 'prod-100', 'name' => 'Desk'],
  ['product_id' => 'prod-200', 'name' => 'Chair'],
], 'name');
// ['Desk', 'Chair']
```
