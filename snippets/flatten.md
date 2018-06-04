### flatten
Flattens an array up to the one level depth.

```php
function flatten($items)
{
    $result = [];
    foreach ($items as $item) {
        if (!is_array($item)) {
            $result[] = $item;
        } else {
            $result = array_merge($result, array_values($item));
        }
    }

    return $result;
}
```

<details>
<summary>Examples</summary>

```php
flatten([1, [2], 3, 4]); // [1, 2, 3, 4]
```

</details>
