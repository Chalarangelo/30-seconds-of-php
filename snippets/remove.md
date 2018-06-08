### remove
Removes elements from an array for which the given function returns false.

```php
function remove($items, $func)
{
    $filtered = array_filter($items, $func);

    return array_diff_key($items, $filtered);
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
