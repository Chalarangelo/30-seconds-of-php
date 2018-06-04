### isPrime
Checks if the provided integer is a prime number.

```php
function isPrime($number)
{
    $boundary = floor(sqrt($number));
    for ($i = 2; $i <= $boundary; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return $number >= 2;
}
```

<details>
<summary>Examples</summary>

```php
isPrime(3); // true
```

</details>
