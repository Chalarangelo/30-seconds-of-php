### isLowerCase

Returns `true` if the given string is lower case, `false` otherwise.

```php
function isLowerCase($string)
{
    $char = mb_substr($string, 0, 1, "UTF-8");
    return mb_strtolower($char, "UTF-8") === $char;
}
```

<details>
<summary>Examples</summary>

```php
isLowerCase('Morning shows the day!'); // false
isLowerCase('hello'); // true
```

</details>
