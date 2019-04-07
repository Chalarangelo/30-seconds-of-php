### rotate

Rotates the array (in left direction) by the number of shifts.

Given the $shift index, it merges the array values after $shift with the values before $shift.

```php
function rotate($arr, $shift=1)
{
  $resultStarting = array_slice($arr, $shift); //extracting elements starting from $shift position till end
  $resultEnding = array_slice($arr, 0, $shift); //extracting elements from start till $shift position
  $result = array_merge($resultStarting, $resultEnding);

  return $result;
}
```

<details>
<summary>Examples</summary>

```php
rotate([1, 3, 5, 2, 4]); // [3, 5, 2, 4, 1]
rotate([1, 3, 5, 2, 4], 2); // [5, 2, 4, 1, 3]
```

</details>
