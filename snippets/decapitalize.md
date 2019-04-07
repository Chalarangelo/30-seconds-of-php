### decapitalize

Decapitalizes the first letter of a string.

Decapitalizes the first letter of the string and then adds it with rest of the string. Omit the ```upperRest``` parameter to keep the rest of the string intact, or set it to ```true``` to convert to uppercase.

```php
function decapitalize($string, $upperRest = false)
{
    return lcfirst($upperRest ? strtoupper($string) : $string);
}
```

<details>
<summary>Examples</summary>

```php
decapitalize('FooBar'); // 'fooBar'
```

</details>
