### palindrome

Returns `true` if the given string is a palindrome, `false` otherwise.

```php
function palindrome($str)
{
	return strrev($str) == $str;
}
```

<details>
<summary>Examples</summary>

```php
palindrome('wow'); // true
```

</details>
