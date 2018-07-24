### orderBy
Sorts the collection of arrays or objects by their elements or properties

```php
function orderBy(array $items, $sortingAttr, $sortingType = 'asc')
{
    if(is_array($items) && !empty($items)){

        $trimmedAttr = trim($sortingAttr, ' ');
        $sortingType = trim($sortingType, ' ');
        $itemValuesForSortingAttr = [];
        foreach($items as $item){
            if(is_object($item) && property_exists($item, $trimmedAttr)){
                $itemValuesForSortingAttr[] = $item->{$trimmedAttr};
            }elseif (is_array($item) && array_key_exists($trimmedAttr, $item)) {
                $itemValuesForSortingAttr[] = $item[$trimmedAttr] ;
            }
        }
        $itemValuesForSortingAttr = array_unique($itemValuesForSortingAttr);
        if(strtolower($sortingType) === 'desc'){
            rsort($itemValuesForSortingAttr);
        }elseif(strtolower($sortingType) === 'asc'){
            sort($itemValuesForSortingAttr);
        }
        $sortedItems = [];
        foreach($itemValuesForSortingAttr as $itemAttrVal){
            $sortedItems[] = array_filter($items, function($itemVal) use($itemAttrVal, $trimmedAttr){
                if(is_object($itemVal)){
                    return $itemVal->{$trimmedAttr} == $itemAttrVal;
                }elseif(is_array($itemVal)){
                    return $itemVal[$trimmedAttr] == $itemAttrVal;
                }

            });
        }
        $sortedItemCollection = [];
        foreach($sortedItems as $sortedItemVals){
            foreach($sortedItemVals as $sortedItemVal){
                $sortedItemCollection [] = $sortedItemVal;
            }
        }
        return $sortedItemCollection;
    }
}
```

<details>
<summary>Examples</summary>

```php
orderBy([
            [
                'id' => 2,
                'name' => 'Joy'
            ],
            [
                'id' => 3,
                'name' => 'Khaja'
            ],
            [
                'id' => 4,
                'name' => 'Khaja'
            ],
            [
                'id' => 1,
                'name' => 'Raja'
            ],

        ],'id', 'desc'); // array(4) {
                              [0]=>
                              array(2) {
                                ["id"]=>
                                int(4)
                                ["name"]=>
                                string(5) "Khaja"
                              }
                              [1]=>
                              array(2) {
                                ["id"]=>
                                int(3)
                                ["name"]=>
                                string(5) "Khaja"
                              }
                              [2]=>
                              array(2) {
                                ["id"]=>
                                int(2)
                                ["name"]=>
                                string(3) "Joy"
                              }
                              [3]=>
                              array(2) {
                                ["id"]=>
                                int(1)
                                ["name"]=>
                                string(4) "Raja"
                              }
                            }
```

</details>
