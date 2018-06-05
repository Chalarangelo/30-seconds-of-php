### startsWith

Check if a string is starts with a given substring.

```php
function startsWith($haystack, $needle)
{
    return substr($haystack, 0, strlen($needle)) === $needle;
}
```

<details>
<summary>Examples</summary>

```php
startsWith('Hi, this is me', 'Hi'); // true
```

</details>
