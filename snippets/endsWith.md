### endsWith

Check if a string is ends with a given substring.

```php
function endsWith($haystack, $needle)
{
    return substr($haystack, -strlen($needle)) === $needle;
}
```

<details>
<summary>Examples</summary>

```php
endsWith('Hi, this is me', 'me'); // true
```

</details>
