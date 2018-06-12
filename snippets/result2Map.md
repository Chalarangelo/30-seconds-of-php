### result2Map

Return a map using the given field as key.

```php
function result2Map($result, $field = 'id')
{
    $map = array();
    if (!$result || !is_array($result)) {
        return $map;
    }

    foreach ($result as $entry) {
        if (is_array($entry)) {
            $map[$entry[$field]] = $entry;
        } else {
            $map[$entry->$field] = $entry;
        }
    }
    return $map;
}
```

<details>
<summary>Examples</summary>

```php
result2Map([
    ['id' => 1, 'name' => 'jack', 'age' => 18],
    ['id' => 2, 'name' => 'mary', 'age' => 19]
], 'name')
/* output
[
   'jack' => ['id' => 1, 'name' => 'jack', 'age' => 18],
   'mary' => ['id' => 2, 'name' => 'mary', 'age' => 19]
]
*/
```

</details>
