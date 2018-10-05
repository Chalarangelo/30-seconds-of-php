### firstStringBetween

Returns the first string there is between the strings from the parameter start and end.

```php
function firstStringBetween($haystack, $start, $end)
{
    return trim(strstr(strstr($haystack, $start), $end, true), $start . $end);
}
```

<details>
<summary>Examples</summary>

```php
firstStringBetween('This is a [custom] string', '[', ']'); // custom
```

</details>
