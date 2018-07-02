### maxN
Returns the n maximum elements from the provided array.

```php
function maxN($numbers)
{
    $maxValue = max($numbers);
    $maxValueArray = array_filter($numbers, function ($value) use ($maxValue) {
        return $maxValue === $value;
    });

    return count($maxValueArray);
}
```

<details>
<summary>Examples</summary>

```php
maxN([1, 2, 3, 4, 5, 5]); // 2
maxN([1, 2, 3, 4, 5]); // 1
```

</details>
