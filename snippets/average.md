---
title:  average
tags: math,beginner
---
Returns the average of two or more numbers.

```php
function average(...$items)
{
  $count = count($items);
  
  return $count === 0 ? 0 : array_sum($items) / $count;
}
```

```php
average(1, 2, 3); // 2
```
