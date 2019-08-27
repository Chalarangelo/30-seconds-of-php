---
title:  startsWith
tags: string,beginner
---

Check if a string starts with a given substring.

```php
function startsWith($haystack, $needle)
{
  return strpos($haystack, $needle) === 0;
}
```

```php
startsWith('Hi, this is me', 'Hi'); // true
```
