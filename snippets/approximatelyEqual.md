### approximatelyEqual

Checks if two numbers are approximately equal to each other.

Use abs() to compare the absolute difference of the two values to epsilon. Omit the third parameter, epsilon, to use a default value of 0.001.

```php
function approximatelyEqual($number1, $number2, $epsilon = 0.001)
{
    return abs($number1 - $number2) < $epsilon;
}
```

<details>
<summary>Examples</summary>

```php
approximatelyEqual(10.0, 10.00001); // true

approximatelyEqual(10.0, 10.01); // false
```

</details>
