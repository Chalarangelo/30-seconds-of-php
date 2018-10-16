### variadicFunction

Variadic functions allows you to capture a variable number of arguments to a function.

The function accepts any number of variables to execute the code. It uses a for loop to iterate over the parameters.

```php
function variadicFunction($operands)
{
    $sum = 0;
    foreach($operands as $singleOperand) {
        $sum += $singleOperand;
    }
    return $sum;
}
```

<details>
<summary>Examples</summary>

```php
variadicFunction([1, 2]); // 3
variadicFunction([1, 2, 3, 4]); // 10
```

</details>
