### palindrome

Returns `true` if the given string is a palindrome, `false` otherwise.

```php
function palindrome($string)
{
    return strrev($string) === $string;
}
```

<details>
<summary>Examples</summary>

```php
palindrome('racecar'); // true
```

</details>
