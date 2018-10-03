### memoize

Memoization of a function results in memory.

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

<details>
<summary>Examples</summary>

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

</details>
