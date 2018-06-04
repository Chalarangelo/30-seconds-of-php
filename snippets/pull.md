### pull
Mutates the original array to filter out the values specified.

```php
function pull($items, ...$params)
{
    $items = array_values(array_diff($items, $params));
    return $items;
}
```

<details>
<summary>Examples</summary>

```php
pull(['a', 'b', 'c', 'a', 'b', 'c'], 'a', 'c'); // ['b', 'b']
```

</details>
