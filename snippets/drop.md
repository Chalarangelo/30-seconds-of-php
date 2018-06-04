### drop
Returns a new array with `n` elements removed from the left.

```php
function drop($items, $n = 1)
{
    return array_slice($items, $n);
}
```

<details>
<summary>Examples</summary>

```php
drop([1, 2, 3]); // [2,3]
drop([1, 2, 3], 2); // [3]
```

</details>
