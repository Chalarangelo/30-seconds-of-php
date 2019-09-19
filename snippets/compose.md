---
title:  compose
tags: function,intermediate
---

Return a new function that composes multiple functions into a single callable.

Use `array_reduce()` to perform right-to-left function composition. 

```php
function compose(...$functions)
{
  return array_reduce(
    $functions,
    function ($carry, $function) {
      return function ($x) use ($carry, $function) {
        return $function($carry($x));
      };
    },
    function ($x) {
      return $x;
    }
  );
}
```

```php
$compose = compose(
  // add 2
  function ($x) {
    return $x + 2;
  },
  // multiply 4
  function ($x) {
    return $x * 4;
  }
);
$compose(3); // 20
```
