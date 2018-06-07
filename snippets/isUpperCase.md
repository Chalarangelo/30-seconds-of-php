### isUpperCase

Returns `true` if the given string is upper case, false otherwise.

```php
function isUpperCase($string)
{
    $chr = mb_substr ($string, 0, 1, "UTF-8");
    return mb_strtolower($chr, "UTF-8") != $chr;
}
```

<details>
<summary>Examples</summary>

```php
isUpperCase('Morning Shows The Day!'); // true
isUpperCase('qUick Fox'); // false
```

</details>
