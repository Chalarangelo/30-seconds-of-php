### curry

Curries a function to take arguments in multiple calls.

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

<details>
<summary>Examples</summary>

```php
$curriedAdd = curry(
    function ($a, $b) {
        return $a + $b;
    }
);

$add10 = $curriedAdd(10);
var_dump($add10(15)); // 25
```

</details>
