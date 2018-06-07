### isAnagram

Compare two strings and returns `true` if both strings are anagram, `false` otherwise.

```php
function isAnagram($string1, $string2)
{
    return count_chars($string1, 1) === count_chars($string2, 1);
}
```

<details>
<summary>Examples</summary>

```php
isAnagram('act', 'cat'); // true
```

</details>
