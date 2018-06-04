### gcd
Calculates the greatest common divisor between two or more numbers.

```php
function gcd(...$numbers)
{
    if (count($numbers) > 2) {
        return array_reduce($numbers, 'gcd');
    }

    $r = $numbers[0] % $numbers[1];
    return $r === 0 ? abs($numbers[1]) : gcd($numbers[1], $r);
}
```

<details>
<summary>Examples</summary>

```php
gcd(8, 36); // 4
gcd(12, 8, 32); // 4
```

</details>
