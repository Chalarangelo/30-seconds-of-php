### without
Filters out the elements of an array, that have one of the specified values.

```php
function without($items, ...$params)
{
    return array_values(array_diff($items, $params));
}
```

<details>
<summary>Examples</summary>

```php
without([2, 1, 2, 3], 1, 2); // [3]
```

</details>
