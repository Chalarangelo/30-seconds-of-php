### tail
Returns all elements in an array except for the first one.

```php
function tail($items)
{
    return count($items) > 1 ? array_slice($items, 1) : $items;
}
```

<details>
<summary>Examples</summary>

```php
tail([1, 2, 3]); // [2, 3]
```

</details>
