### orderBy
Sorts the collection of arrays or objects by their elements or properties

```php
function orderBy(array $items, $sortingAttr, $sortingType = 'asc')
{
    if(is_array($items) && !empty($items)){

            $itemValuesForSortingAttr = [];
            foreach($items as $item){
                if (is_array($item) && array_key_exists(trim($sortingAttr, ' '), $item)) {
                    $itemValuesForSortingAttr[] = $item[$sortingAttr] ;
                }
            }

            $itemValuesForSortingAttr = array_unique($itemValuesForSortingAttr);

            if(strtolower(trim($sortingType, ' ')) === 'desc'){
                rsort($itemValuesForSortingAttr);
            }elseif(strtolower(trim($sortingType, ' ')) === 'asc'){
                sort($itemValuesForSortingAttr);
            }
            $sortedItems = [];
            foreach($itemValuesForSortingAttr as $itemAttrVal){
                $sortedItems[] = array_filter($items, function($itemVal) use($itemAttrVal, $sortingAttr){
                   if(is_array($itemVal)){
                        return $itemVal[$sortingAttr] == $itemAttrVal;
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
