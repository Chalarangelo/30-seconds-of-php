---
title:  memoize
tags: function,advanced
---

Returns the memoized (cached) function.

Create an empty cache by instantiating a new array. 
Return a function which takes a single argument to be supplied to the memoized function by first checking if the function's output for that specific input value is already cached, or store and return it if not. 
Allow access to the cache by setting it as a property on the returned function.

```php
function memoize($func)
{
  return function () use ($func) {
    static $cache = [];

    $args = func_get_args();
    $key = serialize($args);
    $cached = true;

    if (!isset($cache[$key])) {
      $cache[$key] = $func(...$args);
      $cached = false;
    }

    return ['result' => $cache[$key], 'cached' => $cached];
  };
}
```

```php
$memoizedAdd = memoize(
  function ($num) {
    return $num + 10;
  }
);

var_dump($memoizedAdd(5)); // ['result' => 15, 'cached' => false]
var_dump($memoizedAdd(6)); // ['result' => 16, 'cached' => false]
var_dump($memoizedAdd(5)); // ['result' => 15, 'cached' => true]
```
