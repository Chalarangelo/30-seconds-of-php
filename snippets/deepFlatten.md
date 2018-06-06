### deepFlatten
Deep flattens an array.

```php
function deepFlatten($items)
{
    $result = [];
    array_walk_recursive($items, function ($value, $key) use (&$result) {
        $result[] = $value;
    });

    return $result;
}
```

<details>
<summary>Examples</summary>

```php
deepFlatten([1, [2], [[3], 4], 5]); // [1, 2, 3, 4, 5]
```

</details>
