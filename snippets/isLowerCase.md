### isLowerCase

Returns `true` if the given string is lower case, `false` otherwise.

```php
function isLowerCase($string)
{
    $chr = mb_substr ($string, 0, 1, "UTF-8");
    return mb_strtolower($chr, "UTF-8") == $chr;
}
```

<details>
<summary>Examples</summary>

```php
isLowerCase('Morning shows the day!'); // false
isLowerCase('i'); // true
```

</details>
