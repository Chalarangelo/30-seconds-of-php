---
title:  head
tags: array,beginner
---

Returns the head of a list.

Use `reset()` to return the first item in the array.

```php
function head($items)
{
  return reset($items);
}
```

```php
head([1, 2, 3]); // 1
```
