### any
Returns `true` if the provided function returns `true` for at least one element of an array, `false` otherwise.

```php
function any($items, $func)
{
    return in_array(true, array_map($func, $items));
}
```

<details>
<summary>Examples</summary>

```php
any([1, 2, 3, 4], function ($item) {
    return $item < 2;
}); // true
```

</details>
