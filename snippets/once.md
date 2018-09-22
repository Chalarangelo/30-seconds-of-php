### once

Call a function only once.

```php
function once($function)
{
    return function (...$args) use ($function) {
        static $called = false;
        if ($called) {
            return;
        }
        $called = true;
        return call_user_func_array($function, $args);
    };
}
```

<details>
<summary>Examples</summary>

```php
once('sampleInput'); // 'sampleOutput'
```

</details>
