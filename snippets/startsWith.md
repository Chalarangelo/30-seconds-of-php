### startsWith

Check if a string is starts with by another string.

```php
function startsWith($haystack, $needle)
{
    return substr($haystack, 0, strlen($needle)) === $needle;
}
```

<details>
<summary>Examples</summary>

```php
startsWith('sampleInput', 't'); // false
startsWith('sampleInput', 's'); // true
```

</details>
