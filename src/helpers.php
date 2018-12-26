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
    $count = count($items);

    return $count === 0 ? 0 : array_sum($items) / $count;
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

    for ($i = 2; $i < $n; $i++) {
        $sequence[$i] = $sequence[$i-1] + $sequence[$i-2];
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
    for ($i = 1, $max = count($numbers); $i < $max; $i++) {
        $ans = (($numbers[$i] * $ans) / gcd($numbers[$i], $ans));
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

function variadicFunction($operands)
{
    $sum = 0;
    foreach($operands as $singleOperand) {
        $sum += $singleOperand;
    }
    return $sum;
}

function endsWith($haystack, $needle)
{
    return strrpos($haystack, $needle) === (strlen($haystack) - strlen($needle));
}

function startsWith($haystack, $needle)
{
    return strpos($haystack, $needle) === 0;
}

function isContains($string, $needle)
{
    return strpos($string, $needle) !== false;
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
    return trim(strstr(strstr($haystack, $start), $end, true), $start . $end);
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

function maxN($numbers)
{
    $maxValue = max($numbers);
    $maxValueArray = array_filter($numbers, function ($value) use ($maxValue) {
        return $maxValue === $value;
    });

    return count($maxValueArray);
}

function minN($numbers)
{
    $minValue = min($numbers);
    $minValueArray = array_filter($numbers, function ($value) use ($minValue) {
        return $minValue === $value;
    });

    return count($minValueArray);
}

function countVowels($string)
{
    preg_match_all('/[aeiou]/i', $string, $matches);

    return count($matches[0]);
}

function decapitalize($string, $upperRest = false)
{
    return lcfirst($upperRest ? strtoupper($string) : $string);
}

function approximatelyEqual($number1, $number2, $epsilon = 0.001)
{
    return abs($number1 - $number2) < $epsilon;
}

function clampNumber($num, $a, $b)
{
    return max(min($num, max($a, $b)), min($a, $b));
}

function orderBy($items, $attr, $order)
{
    $sortedItems = [];
    foreach ($items as $item) {
        $key = is_object($item) ? $item->{$attr} : $item[$attr];
        $sortedItems[$key] = $item;
    }
    if ($order === 'desc') {
        krsort($sortedItems);
    } else {
        ksort($sortedItems);
    }

    return array_values($sortedItems);
}

function memoize($func)
{
    return function () use ($func) {
        static $cache = [];

        $args = func_get_args();
        $key = serialize($args);
        $cached = true;

        if (!isset($cache[$key])) {
            $cache[$key] = $func(...$args);
            $cached = false;
        }

        return ['result' => $cache[$key], 'cached' => $cached];
    };
}

function curry($function)
{
    $accumulator = function ($arguments) use ($function, &$accumulator) {
        return function (...$args) use ($function, $arguments, $accumulator) {
            $arguments = array_merge($arguments, $args);
            $reflection = new ReflectionFunction($function);
            $totalArguments = $reflection->getNumberOfRequiredParameters();

            if ($totalArguments <= count($arguments)) {
                return $function(...$arguments);
            }

            return $accumulator($arguments);
        };
    };

    return $accumulator([]);
}

function once($function)
{
    return function (...$args) use ($function) {
        static $called = false;
        if ($called) {
            return;
        }
        $called = true;
        return $function(...$args);
    };
}
