### decapitalize

Decapitalizes the first letter of a string.

Decapitalizes the first letter of the sring and then adds it with rest of the string. Omit the ```upperRest``` parameter to keep the rest of the string intact, or set it to ```true``` to convert to uppercase.

```php
function decapitalize($string, $upperRest = false)
{
    return strtolower(substr($string, 0, 1)) . ($upperRest ? strtoupper(substr($string, 1)) : substr($string, 1));
}
```

<details>
<summary>Examples</summary>

```php
decapitalize('FooBar'); // 'fooBar'
```

</details>
