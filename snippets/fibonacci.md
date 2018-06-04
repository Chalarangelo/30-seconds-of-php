### fibonacci
Generates an array, containing the Fibonacci sequence, up until the nth term.

```php
function fibonacci($n)
{
    $sequence = [0, 1];

    for ($i = 0; $i < $n - 2; $i++) {
        array_push($sequence, array_sum(array_slice($sequence, -2, 2, true)));
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
