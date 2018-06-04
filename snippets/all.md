### all
Returns `true` if the provided function returns `true` for all elements of an array, `false` otherwise.

```php
function all($items, $func)
{
    return (bool) array_product(array_map($func, $items));
}
```

<details>
<summary>Examples</summary>

```php
all([2, 3, 4, 5], function ($item) {
    return $item > 1;
}); // true
```

</details>
