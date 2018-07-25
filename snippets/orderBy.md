### orderBy

sorts a collection of arrays or objects by any one of their keys or properties

```php
function orderBy(array $items, $attr, $order = 'asc')
{
    $sortedItemCollection = [];

    $itemVals = array_unique(array_map(function($item) use($attr) {
        return is_object($item) ? $item->{$attr} : $item[$attr] ;
    }, $items));

    if ($order === 'asc') sort($itemVals);
    if ($order === 'desc') rsort($itemVals);

    foreach ($itemVals as $itemVal) {
        $sortedItems = array_filter($items, function($item) use($itemVal, $attr) {
            return (is_object($item) ? $item->{$attr} : $item[$attr]) === $itemVal;
        });
        foreach ($sortedItems as $sortedItem) {
            $sortedItemCollection[] = $sortedItem;
        }
    }

    return $sortedItemCollection;
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
