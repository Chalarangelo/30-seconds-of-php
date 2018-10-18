![Logo](/logo.png)

# 30 seconds of php code
> A curated collection of useful PHP snippets that you can understand in 30 seconds or less.

Note: This project is inspired by [30 Seconds of Code](https://github.com/Chalarangelo/30-seconds-of-code), but there is no affiliation with that project.

## Table of Contents

### 📚 Array

<details>
<summary>View contents</summary>

* [`all`](#all)
* [`any`](#any)
* [`chunk`](#chunk)
* [`deepFlatten`](#deepflatten)
* [`drop`](#drop)
* [`findLast`](#findlast)
* [`findLastIndex`](#findlastindex)
* [`flatten`](#flatten)
* [`groupBy`](#groupby)
* [`hasDuplicates`](#hasduplicates)
* [`head`](#head)
* [`last`](#last)
* [`pluck`](#pluck)
* [`pull`](#pull)
* [`reject`](#reject)
* [`remove`](#remove)
* [`tail`](#tail)
* [`take`](#take)
* [`without`](#without)
* [`orderBy`](#orderby)

</details>

### ➗ Math

<details>
<summary>View contents</summary>

* [`average`](#average)
* [`factorial`](#factorial)
* [`fibonacci`](#fibonacci)
* [`gcd`](#gcd)
* [`isEven`](#iseven)
* [`isPrime`](#isprime)
* [`lcm`](#lcm)
* [`median`](#median)
* [`maxN`](#maxn)
* [`minN`](#minn)
* [`approximatelyEqual`](#approximatelyequal)
* [`clampNumber`](#clampnumber)

</details>

### 📜 String

<details>
<summary>View contents</summary>

* [`endsWith`](#endswith)
* [`firstStringBetween`](#firststringbetween)
* [`isAnagram`](#isanagram)
* [`isLowerCase`](#islowercase)
* [`isUpperCase`](#isuppercase)
* [`palindrome`](#palindrome)
* [`startsWith`](#startswith)
* [`countVowels`](#countvowels)
* [`decapitalize`](#decapitalize)
* [`isContains`](#iscontains)

</details>

### 🎛️ Function

<details>
<summary>View contents</summary>

* [`compose`](#compose)
* [`memoize`](#memoize)
* [`curry`](#curry)
* [`once`](#once)
* [`variadicFunction`](#variadicfunction)

</details>

---
 ## 📚 Array

### all
Returns `true` if the provided function returns `true` for all elements of an array, `false` otherwise.

```php
function all($items, $func)
{
    return count(array_filter($items, $func)) === count($items);
}
```

<details>
<summary>Examples</summary>

```php
all([2, 3, 4, 5], function ($item) {
    return $item > 1;
}); // true
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### any
Returns `true` if the provided function returns `true` for at least one element of an array, `false` otherwise.

```php
function any($items, $func)
{
    return count(array_filter($items, $func)) > 0;
}
```

<details>
<summary>Examples</summary>

```php
any([1, 2, 3, 4], function ($item) {
    return $item < 2;
}); // true
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### chunk
Chunks an array into smaller arrays of a specified size.

```php
function chunk($items, $size)
{
    return array_chunk($items, $size);
}
```

<details>
<summary>Examples</summary>

```php
chunk([1, 2, 3, 4, 5], 2); // [[1, 2], [3, 4], [5]]
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### deepFlatten
Deep flattens an array.

```php
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
```

<details>
<summary>Examples</summary>

```php
deepFlatten([1, [2], [[3], 4], 5]); // [1, 2, 3, 4, 5]
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### drop
Returns a new array with `n` elements removed from the left.

```php
function drop($items, $n = 1)
{
    return array_slice($items, $n);
}
```

<details>
<summary>Examples</summary>

```php
drop([1, 2, 3]); // [2,3]
drop([1, 2, 3], 2); // [3]
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### findLast
Returns the last element for which the provided function returns a truthy value.

```php
function findLast($items, $func)
{
    $filteredItems = array_filter($items, $func);

    return array_pop($filteredItems);
}
```

<details>
<summary>Examples</summary>

```php
findLast([1, 2, 3, 4], function ($n) {
    return ($n % 2) === 1;
});
// 3
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### findLastIndex
Returns the index of the last element for which the provided function returns a truthy value.

```php
function findLastIndex($items, $func)
{
    $keys = array_keys(array_filter($items, $func));

    return array_pop($keys);
}
```

<details>
<summary>Examples</summary>

```php
findLastIndex([1, 2, 3, 4], function ($n) {
    return ($n % 2) === 1;
});
// 2
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### flatten
Flattens an array up to the one level depth.

```php
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
```

<details>
<summary>Examples</summary>

```php
flatten([1, [2], 3, 4]); // [1, 2, 3, 4]
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### groupBy
Groups the elements of an array based on the given function.

```php
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
```

<details>
<summary>Examples</summary>

```php
groupBy(['one', 'two', 'three'], 'strlen'); // [3 => ['one', 'two'], 5 => ['three']]
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### hasDuplicates
Checks a flat list for duplicate values. Returns `true` if duplicate values exists and `false` if values are all unique.

```php
function hasDuplicates($items)
{
    return count($items) > count(array_unique($items));
}
```

<details>
<summary>Examples</summary>

```php
hasDuplicates([1, 2, 3, 4, 5, 5]); // true
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### head
Returns the head of a list.

```php
function head($items)
{
    return reset($items);
}
```

<details>
<summary>Examples</summary>

```php
head([1, 2, 3]); // 1
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### last
Returns the last element in an array.

```php
function last($items)
{
    return end($items);
}
```

<details>
<summary>Examples</summary>

```php
last([1, 2, 3]); // 3
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### pluck
Retrieves all of the values for a given key:

```php
function pluck($items, $key)
{
    return array_map( function($item) use ($key) {
        return is_object($item) ? $item->$key : $item[$key];
    }, $items);
}
```

<details>
<summary>Examples</summary>

```php
pluck([
    ['product_id' => 'prod-100', 'name' => 'Desk'],
    ['product_id' => 'prod-200', 'name' => 'Chair'],
], 'name');
// ['Desk', 'Chair']
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### pull
Mutates the original array to filter out the values specified.

```php
function pull(&$items, ...$params)
{
    $items = array_values(array_diff($items, $params));
    return $items;
}
```

<details>
<summary>Examples</summary>

```php
$items = ['a', 'b', 'c', 'a', 'b', 'c'];
pull($items, 'a', 'c'); // $items will be ['b', 'b']
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### reject
Filters the collection using the given callback.

```php
function reject($items, $func)
{
    return array_values(array_diff($items, array_filter($items, $func)));
}
```

<details>
<summary>Examples</summary>

```php
reject(['Apple', 'Pear', 'Kiwi', 'Banana'], function ($item) {
    return strlen($item) > 4;
}); // ['Pear', 'Kiwi']
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### remove
Removes elements from an array for which the given function returns false.

```php
function remove($items, $func)
{
    $filtered = array_filter($items, $func);

    return array_diff_key($items, $filtered);
}
```

<details>
<summary>Examples</summary>

```php
remove([1, 2, 3, 4], function ($n) {
    return ($n % 2) === 0;
});
// [0 => 1, 2 => 3]
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### tail
Returns all elements in an array except for the first one.

```php
function tail($items)
{
    return count($items) > 1 ? array_slice($items, 1) : $items;
}
```

<details>
<summary>Examples</summary>

```php
tail([1, 2, 3]); // [2, 3]
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### take
Returns an array with n elements removed from the beginning.

```php
function take($items, $n = 1)
{
    return array_slice($items, 0, $n);
}
```

<details>
<summary>Examples</summary>

```php
take([1, 2, 3], 5); // [1, 2, 3]
take([1, 2, 3, 4, 5], 2); // [1, 2]
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### without
Filters out the elements of an array, that have one of the specified values.

```php
function without($items, ...$params)
{
    return array_values(array_diff($items, $params));
}
```

<details>
<summary>Examples</summary>

```php
without([2, 1, 2, 3], 1, 2); // [3]
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### orderBy

Sorts a collection of arrays or objects by key.

```php
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
```

<details>
<summary>Examples</summary>

```php
orderBy(
    [
        ['id' => 2, 'name' => 'Joy'],
        ['id' => 3, 'name' => 'Khaja'],
        ['id' => 1, 'name' => 'Raja']
    ],
    'id',
    'desc'
); // [['id' => 3, 'name' => 'Khaja'], ['id' => 2, 'name' => 'Joy'], ['id' => 1, 'name' => 'Raja']]
```

</details>

<br>[⬆ Back to top](#table-of-contents)


---
 ## ➗ Math

### average
Returns the average of two or more numbers.

```php
function average(...$items)
{
    return count($items) === 0 ? 0 : array_sum($items) / count($items);
}
```

<details>
<summary>Examples</summary>

```php
average(1, 2, 3); // 2
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### factorial
Calculates the factorial of a number.

```php
function factorial($n)
{
    if ($n <= 1) {
        return 1;
    }

    return $n * factorial($n - 1);
}
```

<details>
<summary>Examples</summary>

```php
factorial(6); // 720
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### fibonacci
Generates an array, containing the Fibonacci sequence, up until the nth term.

```php
function fibonacci($n)
{
    $sequence = [0, 1];

    for ($i = 2; $i < $n; $i++) {
        $sequence[$i] = $sequence[$i-1] + $sequence[$i-2];
    }

    return $sequence;
}
```

<details>
<summary>Examples</summary>

```php
fibonacci(6); // [0, 1, 1, 2, 3, 5]
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### gcd
Calculates the greatest common divisor between two or more numbers.

```php
function gcd(...$numbers)
{
    if (count($numbers) > 2) {
        return array_reduce($numbers, 'gcd');
    }

    $r = $numbers[0] % $numbers[1];
    return $r === 0 ? abs($numbers[1]) : gcd($numbers[1], $r);
}
```

<details>
<summary>Examples</summary>

```php
gcd(8, 36); // 4
gcd(12, 8, 32); // 4
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### isEven
Returns `true` if the given number is even, `false` otherwise.

```php
function isEven($number)
{
    return ($number % 2) === 0;
}
```

<details>
<summary>Examples</summary>

```php
isEven(4); // true
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### isPrime
Checks if the provided integer is a prime number.

```php
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
```

<details>
<summary>Examples</summary>

```php
isPrime(3); // true
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### lcm
Returns the least common multiple of two or more numbers.

```php
function lcm(...$numbers)
{
    $ans = $numbers[0];
    for ($i = 1; $i < count($numbers); $i++) {
        $ans = ((($numbers[$i] * $ans)) / (gcd($numbers[$i], $ans)));
    }

    return $ans;
}
```

<details>
<summary>Examples</summary>

```php
lcm(12, 7); // 84
lcm(1, 3, 4, 5); // 60
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### median
Returns the median of an array of numbers.

```php
function median($numbers)
{
    sort($numbers);
    $totalNumbers = count($numbers);
    $mid = floor($totalNumbers / 2);

    return ($totalNumbers % 2) === 0 ? ($numbers[$mid - 1] + $numbers[$mid]) / 2 : $numbers[$mid];
}
```

<details>
<summary>Examples</summary>

```php
median([1, 3, 3, 6, 7, 8, 9]); // 6
median([1, 2, 3, 6, 7, 9]); // 4.5
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### maxN
Returns the n maximum elements from the provided array.

```php
function maxN($numbers)
{
    $maxValue = max($numbers);
    $maxValueArray = array_filter($numbers, function ($value) use ($maxValue) {
        return $maxValue === $value;
    });

    return count($maxValueArray);
}
```

<details>
<summary>Examples</summary>

```php
maxN([1, 2, 3, 4, 5, 5]); // 2
maxN([1, 2, 3, 4, 5]); // 1
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### minN
Returns the n minimum elements from the provided array.

```php
function minN($numbers)
{
    $minValue = min($numbers);
    $minValueArray = array_filter($numbers, function ($value) use ($minValue) {
        return $minValue === $value;
    });

    return count($minValueArray);
}
```

<details>
<summary>Examples</summary>

```php
minN([1, 1, 2, 3, 4, 5, 5]); // 2
minN([1, 2, 3, 4, 5]); // 1
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### approximatelyEqual

Checks if two numbers are approximately equal to each other.

Use abs() to compare the absolute difference of the two values to epsilon. Omit the third parameter, epsilon, to use a default value of 0.001.

```php
function approximatelyEqual($number1, $number2, $epsilon = 0.001)
{
    return abs($number1 - $number2) < $epsilon;
}
```

<details>
<summary>Examples</summary>

```php
approximatelyEqual(10.0, 10.00001); // true

approximatelyEqual(10.0, 10.01); // false
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### clampNumber

Clamps num within the inclusive range specified by the boundary values a and b.

If num falls within the range, return num. Otherwise, return the nearest number in the range.

```php
function clampNumber($num, $a, $b)
{
    return max(min($num, max($a, $b)), min($a, $b));
}
```

<details>
<summary>Examples</summary>

```php
clampNumber(2, 3, 5); // 3
clampNumber(1, -1, -5); // -1
```

</details>

<br>[⬆ Back to top](#table-of-contents)


---
 ## 📜 String

### endsWith

Check if a string is ends with a given substring.

```php
function endsWith($haystack, $needle)
{
    return strrpos($haystack, $needle) === (strlen($haystack) - strlen($needle));
}
```

<details>
<summary>Examples</summary>

```php
endsWith('Hi, this is me', 'me'); // true
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### firstStringBetween

Returns the first string there is between the strings from the parameter start and end.

```php
function firstStringBetween($haystack, $start, $end)
{
    return trim(strstr(strstr($haystack, $start), $end, true), $start . $end);
}
```

<details>
<summary>Examples</summary>

```php
firstStringBetween('This is a [custom] string', '[', ']'); // custom
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### isAnagram

Compare two strings and returns `true` if both strings are anagram, `false` otherwise.

```php
function isAnagram($string1, $string2)
{
    return count_chars($string1, 1) === count_chars($string2, 1);
}
```

<details>
<summary>Examples</summary>

```php
isAnagram('act', 'cat'); // true
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### isLowerCase

Returns `true` if the given string is lower case, `false` otherwise.

```php
function isLowerCase($string)
{
    return $string === strtolower($string);
}
```

<details>
<summary>Examples</summary>

```php
isLowerCase('Morning shows the day!'); // false
isLowerCase('hello'); // true
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### isUpperCase

Returns `true` if the given string is upper case, false otherwise.

```php
function isUpperCase($string)
{
    return $string === strtoupper($string);
}
```

<details>
<summary>Examples</summary>

```php
isUpperCase('MORNING SHOWS THE DAY!'); // true
isUpperCase('qUick Fox'); // false
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### palindrome

Returns `true` if the given string is a palindrome, `false` otherwise.

```php
function palindrome($string)
{
    return strrev($string) === (string) $string;
}
```

<details>
<summary>Examples</summary>

```php
palindrome('racecar'); // true
palindrome(2221222); // true
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### startsWith

Check if a string starts with a given substring.

```php
function startsWith($haystack, $needle)
{
    return strpos($haystack, $needle) === 0;
}
```

<details>
<summary>Examples</summary>

```php
startsWith('Hi, this is me', 'Hi'); // true
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### countVowels

Returns number of vowels in provided string.

Use a regular expression to count the number of vowels (A, E, I, O, U) in a string.

```php
function countVowels($string)
{
    preg_match_all('/[aeiou]/i', $string, $matches);

    return count($matches[0]);
}
```

<details>
<summary>Examples</summary>

```php
countVowels('sampleInput'); // 4
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### decapitalize

Decapitalizes the first letter of a string.

Decapitalizes the first letter of the string and then adds it with rest of the string. Omit the ```upperRest``` parameter to keep the rest of the string intact, or set it to ```true``` to convert to uppercase.

```php
function decapitalize($string, $upperRest = false)
{
    return lcfirst($upperRest ? strtoupper($string) : $string);
}
```

<details>
<summary>Examples</summary>

```php
decapitalize('FooBar'); // 'fooBar'
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### isContains

Check if a word / substring exist in a given string input.
Using `strpos` to find the position of the first occurrence of a substring in a string. Returns either `true` or `false`
```php
function isContains($string, $needle)
{
    return strpos($string, $needle);
}
```

<details>
<summary>Examples</summary>

```php
isContains('This is an example string', 'example'); // true
```
```php
isContains('This is an example string', 'hello'); // false
```
</details>

<br>[⬆ Back to top](#table-of-contents)


---
 ## 🎛️ Function

### compose

Return a new function that composes multiple functions into a single callable.

```php
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
```

<details>
<summary>Examples</summary>

```php
$compose = compose(
    // add 2
    function ($x) {
        return $x + 2;
    },
    // multiply 4
    function ($x) {
        return $x * 4;
    }
);
$compose(3); // 20
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### memoize

Memoization of a function results in memory.

```php
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
```

<details>
<summary>Examples</summary>

```php
$memoizedAdd = memoize(
    function ($num) {
        return $num + 10;
    }
);

var_dump($memoizedAdd(5)); // ['result' => 15, 'cached' => false]
var_dump($memoizedAdd(6)); // ['result' => 16, 'cached' => false]
var_dump($memoizedAdd(5)); // ['result' => 15, 'cached' => true]
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### curry

Curries a function to take arguments in multiple calls.

```php
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
```

<details>
<summary>Examples</summary>

```php
$curriedAdd = curry(
    function ($a, $b) {
        return $a + $b;
    }
);

$add10 = $curriedAdd(10);
var_dump($add10(15)); // 25
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### once

Call a function only once.

```php
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
```

<details>
<summary>Examples</summary>

```php
$add = function ($a, $b) {
    return $a + $b;
};

$once = once($add);

var_dump($once(10, 5)); // 15
var_dump($once(20, 10)); // null
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### variadicFunction

Variadic functions allows you to capture a variable number of arguments to a function.

The function accepts any number of variables to execute the code. It uses a for loop to iterate over the parameters.

```php
function variadicFunction($operands)
{
    $sum = 0;
    foreach($operands as $singleOperand) {
        $sum += $singleOperand;
    }
    return $sum;
}
```

<details>
<summary>Examples</summary>

```php
variadicFunction([1, 2]); // 3
variadicFunction([1, 2, 3, 4]); // 10
```

</details>

<br>[⬆ Back to top](#table-of-contents)

## Contribute
You're always welcome to contribute to this project. Please read the [contribution guide](CONTRIBUTING.md).

## License

This project is licensed under the MIT License - see the [License File](LICENSE) for details
