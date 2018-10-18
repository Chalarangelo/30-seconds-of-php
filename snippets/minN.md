### minN
Returns the n minimum elements from the provided array.

```php
function minN($numbers)
{
    $minValue = min($numbers);
    $minValueArray = array_filter($numbers, function ($value) use ($minValue) {
        return $minValue === $value;
    });

    return count($minValueArray);
}
```

<details>
<summary>Examples</summary>

```php
minN([1, 1, 2, 3, 4, 5, 5]); // 2
minN([1, 2, 3, 4, 5]); // 1
```

</details>
