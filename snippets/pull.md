### pull
Mutates the original array to filter out the values specified.

```php
function pull(&$items, ...$params)
{
    $items = array_values(array_diff($items, $params));
    return $items;
}
```

<details>
<summary>Examples</summary>

```php
$array = ['a', 'b', 'c', 'a', 'b', 'c'];
pull($array, 'a', 'c'); // $array will be ['b', 'b']
```

</details>
