### removeBeginning

Removes a specified substring that is present at the start of a string.


```php
function removeBeginning($str, $substring)
{ 	
    if(substr($str, 0, strlen($substring))==$substring){
        $str=substr($str,strlen($substring))
    }
    return $str;
}
```

<details>
<summary>Examples</summary>

```php
removeBeginning("Dunder","Dunder Mifflin"); // ' Mifflin'
```

</details>
