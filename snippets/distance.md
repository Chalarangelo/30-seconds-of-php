### distance

Returns distance between two lat/long points in different units.

Use a trigonometry formulas to count distance between two geo locations and converts into standard units.
```
"M" :   Miles
"K" :   KiloMeter
"N" :   Nautical Miles
```


```php
function distance($lat1, $lon1, $lat2, $lon2, $unit = 'M')
{
    $miles = rad2deg(acos(sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($lon1 - $lon2)))) * 60 * 1.1515;
    if ($unit == 'K')
        return $miles * 1.609344;
    if ($unit == 'N')
        return $miles * 0.8684;
    return $miles;
}
```

<details>
<summary>Examples</summary>

```php
distance(37.090240, -95.712891, -25.274399, 133.775131, 'M'); //8193.1341763628

distance(37.090240, -95.712891, -25.274399, 133.775131, 'K'); //15183.753256476704

distance(37.090240, -95.712891, -25.274399, 133.775131, 'N'); //8193.1341763628
```

</details>
