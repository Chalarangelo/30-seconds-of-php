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
    $keys = array_keys(array_filter($items, $func));

    foreach ($keys as $key) {
        unset($items[$key]);
    }

    return $items;
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
    return count($items) !== count(array_unique($items));
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
    return count($items === 0) ? 0 : array_sum($items) / count($items);
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
     return substr($haystack, 0, strlen($needle)) === $needle;
}

function isLowerCase($string)
{
    $char = mb_substr($string, 0, 1, "UTF-8");
    return mb_strtolower($char, "UTF-8") === $char;
}

function isUpperCase($string)
{
    $char = mb_substr($string, 0, 1, "UTF-8");
    return mb_strtolower($char, "UTF-8") !== $char;
}

function isAnagram($string1, $string2)
{
    return count_chars($string1, 1) === count_chars($string2, 1);
}

function palindrome($string)
{
    return strrev($string) === $string;
}
