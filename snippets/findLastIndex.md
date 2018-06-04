### findLastIndex
Returns the index of the last element for which the provided function returns a truthy value.

```php
function findLastIndex($items, $func)
{
    $keys = array_keys(array_filter($items, $func));

    return array_pop($keys);
}
```

<details>
<summary>Examples</summary>

```php
findLastIndex([1, 2, 3, 4], function ($n) {
    return ($n % 2) === 1;
});
// 2
```

</details>
