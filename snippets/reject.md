### reject
Filters the collection using the given callback.

```php
function reject($func, $items)
{
    return array_values(array_diff($items, array_filter($items, $func)));
}
```

<details>
<summary>Examples</summary>

```php
reject(function ($item) {
    return strlen($item) > 4;
}, ['Apple', 'Pear', 'Kiwi', 'Banana']); // ['Pear', 'Kiwi']
```

</details>
