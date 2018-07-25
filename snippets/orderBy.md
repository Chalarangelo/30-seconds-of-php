### orderBy

Sorts a collection of arrays or objects by key.

```php
function orderBy($items, $attr, $order)
{
    $sortedItems = [];
    foreach ($items as $item) {
        $key = is_object($item) ? $item->{$attr} : $item[$attr];
        $sortedItems[$key] = $item;
    }
    if ($order === 'desc') {
        krsort($sortedItems);
    } else {
        ksort($sortedItems);
    }

    return array_values($sortedItems);
}
```

<details>
<summary>Examples</summary>

```php
orderBy(
    [
        ['id' => 2, 'name' => 'Joy'],
        ['id' => 3, 'name' => 'Khaja'],
        ['id' => 1, 'name' => 'Raja']
    ],
    'id',
    'desc'
); // [['id' => 3, 'name' => 'Khaja'], ['id' => 2, 'name' => 'Joy'], ['id' => 1, 'name' => 'Raja']]
```

</details>
