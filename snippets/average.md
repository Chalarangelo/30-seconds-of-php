### average
Returns the average of two or more numbers.

```php
function average(...$items)
{
    $count = count($items);
    
    return $count === 0 ? 0 : array_sum($items) / $count;
}
```

<details>
<summary>Examples</summary>

```php
average(1, 2, 3); // 2
```

</details>
