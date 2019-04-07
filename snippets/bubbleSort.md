### bubbleSort

Sorts an array using a Bubble sort algorithm.

This sorting algorithm is comparison-based algorithm in which each pair of adjacent elements is compared and the elements are swapped if they are not in order.

```php
function bubbleSort($array) {
    $array = array_unique($array);
    $arrayLength = count($array);
    for ($i = 0; $i < $arrayLength - 1; $i++) { 
        $swapped = false;
        for ($j = 0; $j < $arrayLength - 1 - $i; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
                $swapped = true;
            }
        }
        if (!$swapped) {
            break;
        }
    }
    return $array;
}
```
<details>

<summary>Examples</summary>

```php
bubbleSort([44, 11, 7, 20, 12, 90, 35, 5]); // [5,7,11,12,20,35,44,90]
```
</details>
