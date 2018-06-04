### findLast
Returns the last element for which the provided function returns a truthy value.

```php
function findLast($items, $func)
{
    $filteredItems = array_filter($items, $func);

    return array_pop($filteredItems);
}
```

<details>
<summary>Examples</summary>

```php
findLast([1, 2, 3, 4], function ($n) {
    return ($n % 2) === 1;
});
// 3
```

</details>
