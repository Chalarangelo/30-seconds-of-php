### reject
Filters the collection using the given callback.

```php
function reject($items, $func)
{
    return array_values(array_diff($items, array_filter($items, $func)));
}
```

<details>
<summary>Examples</summary>

```php
reject(['Apple', 'Pear', 'Kiwi', 'Banana'], function ($item) {
    return strlen($item) > 4;
}); // ['Pear', 'Kiwi']
```

</details>
