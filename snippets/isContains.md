### isContains

Check if a word / substring exist in a given string input.
Using `strpos` to find the position of the first occurrence of a substring in a string. Returns either `true` or `false`
```php
function isContains($string, $needle)
{
    return strpos($string, $needle);
}
```

<details>
<summary>Examples</summary>

```php
isContains('This is an example string', 'example'); // true
```
```php
isContains('This is an example string', 'hello'); // false
```
</details>
