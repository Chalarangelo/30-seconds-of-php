---
title:  curry
tags: function,advanced
---

Curries a function to take arguments in multiple calls.

If the number of provided arguments (`$args`) is sufficient, call the passed function, `$function`.
Otherwise, return a curried function that expects the rest of the arguments.

```php
function curry($function)
{
  $accumulator = function ($arguments) use ($function, &$accumulator) {
    return function (...$args) use ($function, $arguments, $accumulator) {
      $arguments = array_merge($arguments, $args);
      $reflection = new ReflectionFunction($function);
      $totalArguments = $reflection->getNumberOfRequiredParameters();

      if ($totalArguments <= count($arguments)) {
        return $function(...$arguments);
      }

      return $accumulator($arguments);
    };
  };

  return $accumulator([]);
}
```

```php
$curriedAdd = curry(
  function ($a, $b) {
    return $a + $b;
  }
);

$add10 = $curriedAdd(10);
var_dump($add10(15)); // 25
```
