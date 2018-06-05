### endsWith

Check if a string is ends with by another string.

```php
function endsWith($haystack, $needle)
{
    return substr($haystack, -strlen($needle))===$needle;
}
```

<details>
<summary>Examples</summary>

```php
endsWith('sampleInput','t'); // true
endsWith('sampleInput','s'); // false
```

</details>
