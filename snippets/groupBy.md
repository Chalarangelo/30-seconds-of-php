---
title:  groupBy
tags: array,intermediate
---

Groups the elements of an array based on the given function.

Use `call_use_func()` with `$func` on `$items` to group them based on `$func`.

```php
function groupBy($items, $func)
{
  $group = [];
  foreach ($items as $item) {
    if ((!is_string($func) && is_callable($func)) || function_exists($func)) {
      $key = call_user_func($func, $item);
      $group[$key][] = $item;
    } elseif (is_object($item)) {
      $group[$item->{$func}][] = $item;
    } elseif (isset($item[$func])) {
      $group[$item[$func]][] = $item;
    }
  }

  return $group;
}
```

```php
groupBy(['one', 'two', 'three'], 'strlen'); // [3 => ['one', 'two'], 5 => ['three']]
```
