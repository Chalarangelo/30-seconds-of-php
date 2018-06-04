### chunk
Chunks an array into smaller arrays of a specified size.

```php
function chunk($items, $size)
{
    return array_chunk($items, $size);
}
```

<details>
<summary>Examples</summary>

```php
chunk([1, 2, 3, 4, 5], 2); // [[1, 2], [3, 4], [5]]
```

</details>
