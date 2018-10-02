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
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
        return ($miles * 1.609344);
    } else if ($unit == "N") {
        return ($miles * 0.8684);
    } else {
        return $miles;
    }
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
