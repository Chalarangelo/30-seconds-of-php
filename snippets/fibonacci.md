### fibonacci
Generates an array, containing the Fibonacci sequence, up until the nth term.

```php
function fibonacci($n)
{
    $sequence = [0, 1];

    for ($i = 2; $i < $n; $i++) {
        $sequence[$i] = $sequence[$i-1] + $sequence[$i-2];
    }

    return $sequence;
}
```

<details>
<summary>Examples</summary>

```php
fibonacci(6); // [0, 1, 1, 2, 3, 5]
```

</details>
