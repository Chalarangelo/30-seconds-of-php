### lcm
Returns the least common multiple of two or more numbers.

```php
function lcm(...$numbers)
{
    $ans = $numbers[0];
    for ($i = 1; $i < count($numbers); $i++) {
        $ans = ((($numbers[$i] * $ans)) / (gcd($numbers[$i], $ans)));
    }

    return $ans;
}
```

<details>
<summary>Examples</summary>

```php
lcm(12, 7); // 84
lcm(1, 3, 4, 5); // 60
```

</details>
