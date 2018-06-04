### average
Returns the average of two or more numbers.

```php
function average(...$items)
{
    return array_sum($items) / count($items);
}
```

<details>
<summary>Examples</summary>

```php
average(1, 2, 3); // 2
```

</details>
