---
title:  tail
tags: array,beginner
---

Returns all elements in an array except for the first one.

Use `array_slice()` and `count()` to return all the items in the array except for the first one.

```php
function tail($items)
{
  return count($items) > 1 ? array_slice($items, 1) : $items;
}
```

```php
tail([1, 2, 3]); // [2, 3]
```
