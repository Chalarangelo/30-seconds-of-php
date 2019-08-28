---
title:  isContains
tags: string,beginner
---

Check if a word / substring exists in a given string input.

Using `strpos()` to find the position of the first occurrence of a substring in a string. 

```php
function isContains($string, $needle)
{
  return strpos($string, $needle) === false ? false : true;
}
```

```php
isContains('This is an example string', 'example'); // true
isContains('This is an example string', 'hello'); // false
```
