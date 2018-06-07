### isUpperCase

Returns `true` if the given string is upper case, false otherwise.

```php
function isUpperCase($string)
{
    $char = mb_substr($string, 0, 1, "UTF-8");
    return mb_strtolower($char, "UTF-8") !== $char;
}
```

<details>
<summary>Examples</summary>

```php
isUpperCase('Morning Shows The Day!'); // true
isUpperCase('qUick Fox'); // false
```

</details>
