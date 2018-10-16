### isContain

Check if a word / substring exist in a given string input.
Using `strpos` to find the position of the first occurrence of a substring in a string. Returns either `true` or `false`
```php
function isContain($string,$needle)
{
  return strpos($string,$needle);
}
```

<details>
<summary>Examples</summary>

```php
isContain('This is an example string', 'example'); // true
```
```php
isContain('This is an example string', 'hello'); // false
```
</details>
