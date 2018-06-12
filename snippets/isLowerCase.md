### isLowerCase

Returns `true` if the given string is lower case, `false` otherwise.

```php
function isLowerCase($string)
{
    return $string === strtolower($string);
}
```

<details>
<summary>Examples</summary>

```php
isLowerCase('Morning shows the day!'); // false
isLowerCase('hello'); // true
```

</details>
