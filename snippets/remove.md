### remove
Removes elements from an array for which the given function returns false.

```php
function remove($items, $func)
{
    $keys = array_keys(array_filter($items, $func));

    foreach ($keys as $key) {
        unset($items[$key]);
    }

    return $items;
}
```

<details>
<summary>Examples</summary>

```php
remove([1, 2, 3, 4], function ($n) {
    return ($n % 2) === 0;
});
// [0 => 1, 2 => 3]
```

</details>
