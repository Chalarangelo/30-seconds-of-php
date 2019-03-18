### arrayToCSV

Return a CSV-formatted string representation for given array-of-arrays, optionally specifying the column delimiter. 

Numeric values are rendered as-is, strings are enclosed double quotes (") and double quotes within strings are escaped with a double quote ("").

```php
function arrayToCSV($rows, $del = ',')
{
    $escape = function ($x) {
        return is_numeric($x) ? $x : '"'.str_replace('"', '""', $x).'"';
    };
    $rowToCsv = function ($row) use ($del, $escape) {
        return implode($del, array_map($escape, $row));
    };
    return implode("\n", array_map($rowToCsv, $rows));
}
```

<details>
<summary>Examples</summary>

```php
arrayToCSV([['a', '"b" good'], ['delta', 3.14159], ['c', 42]])
// "a","""b"" good"
// "delta",3.14159
// "c",42
```

</details>
