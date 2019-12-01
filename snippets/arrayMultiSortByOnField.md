---
title: sortMultiArrayByColumn
tags: array,intermediate
---

Sort Multi Array By Column

```php
function sortMultiArrayByColumn(array $data, $fieldName, $sortString = SORT_DESC)
{
    if (!$data) {
        return $data;
    }
    $fieldRs = array();
    foreach ($data as $key => $value) {
        $fieldRs[$key] = $value[$fieldName];
    }
    array_multisort($fieldRs, $sortString, $data);
    return $data;
}
```

```php
$data = [["name" => "Kenval", "age" => 2], ["name" => "Datevial", "age" => 10]];
var_dump(sortMultiArrayByColumn($data, 'age')); // [["name" => "Datevial", "age" => 10], ["name" => "Kenval", "age" => 2]]
```
