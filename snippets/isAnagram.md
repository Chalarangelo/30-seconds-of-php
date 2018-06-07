### isAnagram

Compare two string and return `true` if both strings are anagram, `false` otherwise.

```php
function isAnagram($str1,$str2)
{
	return(count_chars($str1, 1) == count_chars($str2, 1));
}
```

<details>
<summary>Examples</summary>

```php
isAnagram('looped','poodle'); // true
```

</details>
