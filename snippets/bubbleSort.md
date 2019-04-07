###bubbleSort

Sorts an array using Bubblesort algorithm.

This sorting algorithm is comparison-based algorithm in which each pair of adjacent elements is compared and the elements are swapped if they are not in order.

```php
function bubbleSort($arr){
    $arr = array_unique($arr);
    for($i=0; $i<sizeof($arr)-1; $i++) { 
        $swapped = false;
        for($j=0; $j<sizeof($arr)-1-$i; $j++){
            if($arr[$j] > $arr[$j+1]){
                $temp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $temp;
                $swapped = true;
            }
        }
        if(!$swapped){
            break;
        }
    }
    return $arr;
}
```
<details>

<summary>Examples</summary>

```php
bubbleSort([44, 11, 7, 20, 12, 90, 35, 5]); // [5,7,11,12,20,35,44,90]
```
</details>
