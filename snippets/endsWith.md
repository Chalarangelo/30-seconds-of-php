---
title:  endsWith
tags: string,beginner
---

Check if a string is ends with a given substring.

```php
function endsWith($haystack, $needle)
{
  return strrpos($haystack, $needle) === (strlen($haystack) - strlen($needle));
}
```

```php
endsWith('Hi, this is me', 'me'); // true
```
