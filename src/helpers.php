<?php

function all($items, $func)
{
    return count(array_filter($items, $func)) === count($items);
}

function any($items, $func)
{
    return count(array_filter($items, $func)) > 0;
}

function chunk($items, $size)
{
    return array_chunk($items, $size);
}

function flatten($items)
{
    $result = [];
    foreach ($items as $item) {
        if (!is_array($item)) {
            $result[] = $item;
        } else {
            $result = array_merge($result, array_values($item));
        }
    }

    return $result;
}

function deepFlatten($items)
{
    $result = [];
    foreach ($items as $item) {
        if (!is_array($item)) {
            $result[] = $item;
        } else {
            $result = array_merge($result, deepFlatten($item));
        }
    }

    return $result;
}

function drop($items, $n = 1)
{
    return array_slice($items, $n);
}

function findLast($items, $func)
{
    $filteredItems = array_filter($items, $func);

    return array_pop($filteredItems);
}

function findLastIndex($items, $func)
{
    $keys = array_keys(array_filter($items, $func));

    return array_pop($keys);
}

function head($items)
{
    return reset($items);
}

function tail($items)
{
    return count($items) > 1 ? array_slice($items, 1) : $items;
}

function last($items)
{
    return end($items);
}

function pull(&$items, ...$params)
{
    $items = array_values(array_diff($items, $params));
    return $items;
}

function pluck($items, $key)
{
    return array_map(function ($item) use ($key) {
        return is_object($item) ? $item->$key : $item[$key];
    }, $items);
}

function reject($items, $func)
{
    return array_values(array_diff($items, array_filter($items, $func)));
}

function remove($items, $func)
{
    $filtered = array_filter($items, $func);

    return array_diff_key($items, $filtered);
}

function take($items, $n = 1)
{
    return array_slice($items, 0, $n);
}

function without($items, ...$params)
{
    return array_values(array_diff($items, $params));
}

function hasDuplicates($items)
{
    return count($items) > count(array_unique($items));
}

function groupBy($items, $func)
{
    $group = [];
    foreach ($items as $item) {
        if ((!is_string($func) && is_callable($func)) || function_exists($func)) {
            $key = call_user_func($func, $item);
            $group[$key][] = $item;
        } elseif (is_object($item)) {
            $group[$item->{$func}][] = $item;
        } elseif (isset($item[$func])) {
            $group[$item[$func]][] = $item;
        }
    }

    return $group;
}

function average(...$items)
{
    return count($items) === 0 ? 0 : array_sum($items) / count($items);
}

function factorial($n)
{
    if ($n <= 1) {
        return 1;
    }

    return $n * factorial($n - 1);
}

function fibonacci($n)
{
    $sequence = [0, 1];

    for ($i = 0; $i < $n - 2; $i++) {
        array_push($sequence, array_sum(array_slice($sequence, -2, 2, true)));
    }

    return $sequence;
}

function gcd(...$numbers)
{
    if (count($numbers) > 2) {
        return array_reduce($numbers, 'gcd');
    }

    $r = $numbers[0] % $numbers[1];
    return $r === 0 ? abs($numbers[1]) : gcd($numbers[1], $r);
}

function lcm(...$numbers)
{
    $ans = $numbers[0];
    for ($i = 1; $i < count($numbers); $i++) {
        $ans = ((($numbers[$i] * $ans)) / (gcd($numbers[$i], $ans)));
    }

    return $ans;
}

function isPrime($number)
{
    $boundary = floor(sqrt($number));
    for ($i = 2; $i <= $boundary; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return $number >= 2;
}

function isEven($number)
{
    return ($number % 2) === 0;
}

function median($numbers)
{
    sort($numbers);
    $totalNumbers = count($numbers);
    $mid = floor($totalNumbers / 2);

    return ($totalNumbers % 2) === 0 ? ($numbers[$mid - 1] + $numbers[$mid]) / 2 : $numbers[$mid];
}

function endsWith($haystack, $needle)
{
    return substr($haystack, -strlen($needle)) === $needle;
}

function startsWith($haystack, $needle)
{
     return 0 === strpos($haystack, $needle);
}

function isLowerCase($string)
{
    return $string === strtolower($string);
}

function isUpperCase($string)
{
    return $string === strtoupper($string);
}

function isAnagram($string1, $string2)
{
    return count_chars($string1, 1) === count_chars($string2, 1);
}

function palindrome($string)
{
    return strrev($string) === $string;
}

function firstStringBetween($haystack, $start, $end)
{
    $char = strpos($haystack, $start);
    if ($char === false) {
        return '';
    }

    $char += strlen($start);
    $len = strpos($haystack, $end, $char) - $char;

    return substr($haystack, $char, $len);
}

function compose(...$functions)
{
    return array_reduce(
        $functions,
        function ($carry, $function) {
            return function ($x) use ($carry, $function) {
                return $function($carry($x));
            };
        },
        function ($x) {
            return $x;
        }
    );
}

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
