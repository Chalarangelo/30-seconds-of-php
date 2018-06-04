### factorial
Calculates the factorial of a number.

```php
function factorial($n)
{
    if ($n <= 1) {
        return 1;
    }

    return $n * factorial($n - 1);
}
```

<details>
<summary>Examples</summary>

```php
factorial(6); // 720
```

</details>
