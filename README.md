![Logo](/logo.png)

# 30 seconds of PHP

> Curated collection of useful PHP snippets that you can understand in 30 seconds or less.

* Use <kbd>Ctrl</kbd> + <kbd>F</kbd> or <kbd>command</kbd> + <kbd>F</kbd> to search for a snippet.
* Contributions welcome, please read the [contribution guide](CONTRIBUTING.md).

#### Related projects

* [30 Seconds of Code](https://30secondsofcode.org/)
* [30 Seconds of CSS](https://css.30secondsofcode.org/)
* [30 Seconds of Interviews](https://30secondsofinterviews.org/)
* [30 Seconds of React](https://github.com/30-seconds/30-seconds-of-react)
* [30 Seconds of Python](https://github.com/30-seconds/30-seconds-of-python-code)
* [30 Seconds of PHP](https://github.com/30-seconds/30-seconds-of-php-code)
* [30 Seconds of Knowledge](https://chrome.google.com/webstore/detail/30-seconds-of-knowledge/mmgplondnjekobonklacmemikcnhklla)
* [30 Seconds of Kotlin](https://github.com/IvanMwiruki/30-seconds-of-kotlin) _(unofficial)_

## Contents

### 📚 Array

<details>
<summary>View contents</summary>

* [`all`](#all)
* [`any`](#any)
* [`deepFlatten`](#deepflatten)
* [`drop`](#drop)
* [`findLast`](#findlast)
* [`findLastIndex`](#findlastindex)
* [`flatten`](#flatten)
* [`groupBy`](#groupby)
* [`hasDuplicates`](#hasduplicates)
* [`head`](#head)
* [`last`](#last)
* [`orderBy`](#orderby-)
* [`pluck`](#pluck)
* [`pull`](#pull)
* [`reject`](#reject)
* [`remove`](#remove)
* [`rotate`](#rotate)
* [`tail`](#tail)
* [`take`](#take)
* [`without`](#without)

</details>

### 🎛️ Function

<details>
<summary>View contents</summary>

* [`compose`](#compose)
* [`curry`](#curry-)
* [`memoize`](#memoize-)
* [`once`](#once)

</details>

### ➗ Math

<details>
<summary>View contents</summary>

* [`approximatelyEqual`](#approximatelyequal)
* [`average`](#average)
* [`clampNumber`](#clampnumber)
* [`factorial`](#factorial)
* [`fibonacci`](#fibonacci)
* [`gcd`](#gcd)
* [`isEven`](#iseven)
* [`isPrime`](#isprime)
* [`lcm`](#lcm)
* [`maxN`](#maxn)
* [`median`](#median)
* [`minN`](#minn)

</details>

### 📜 String

<details>
<summary>View contents</summary>

* [`countVowels`](#countvowels)
* [`decapitalize`](#decapitalize)
* [`endsWith`](#endswith)
* [`firstStringBetween`](#firststringbetween)
* [`isAnagram`](#isanagram)
* [`isContains`](#iscontains)
* [`isLowerCase`](#islowercase)
* [`isUpperCase`](#isuppercase)
* [`palindrome`](#palindrome)
* [`shorten`](#shorten)
* [`startsWith`](#startswith)

</details>


---

## 📚 Array


### all

Returns `true` if the provided function returns `true` for all elements of an array, `false` otherwise.

Use `array_filter()` and `count()` to check if `$func` returns `true` for all the elements in `$items`.

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

<br>[⬆ Back to top](#contents)

### any

Returns `true` if the provided function returns `true` for at least one element of an array, `false` otherwise.

Use `array_filter()` and `count()` to check if `$func` returns `true` for any of the elements in `$items`.

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

<br>[⬆ Back to top](#contents)

### deepFlatten

Deep flattens an array.

Use recursion.
Use `array_push`, splat operator and an empty array to flatten the array.
Recursively flatten each element that is an array.

```php
function deepFlatten($items)
{
  $result = [];
  foreach ($items as $item) {
    if (!is_array($item)) {
      $result[] = $item;
    } else {
      array_push($result, ...deepFlatten($item));
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

<br>[⬆ Back to top](#contents)

### drop

Returns a new array with `$n` elements removed from the left.

Use `array_slice()` to remove `$n` elements from the left.
Omit the second argument, `$n`, to only remove one element.

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

<br>[⬆ Back to top](#contents)

### findLast

Returns the last element for which the provided function returns a truthy value.

Use `array_filter()` to remove elements for which `$func` returns falsy values, `array_pop()` to get the last one.

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

<br>[⬆ Back to top](#contents)

### findLastIndex

Returns the index of the last element for which the provided function returns a truthy value.

Use `array_keys()` and `array_filter()` to remove elements for which `$func` returns falsy values, `array_pop()` to get the last one.

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

<br>[⬆ Back to top](#contents)

### flatten

Flattens an array up to the one level depth.

Use `array_push()`, splat operator and `array_values()` to flatten the array.

```php
function flatten($items)
{
  $result = [];
  foreach ($items as $item) {
    if (!is_array($item)) {
      $result[] = $item;
    } else {
      array_push($result, ...array_values($item));
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

<br>[⬆ Back to top](#contents)

### groupBy

Groups the elements of an array based on the given function.

Use `call_use_func()` with `$func` on `$items` to group them based on `$func`.

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

<br>[⬆ Back to top](#contents)

### hasDuplicates

Checks a flat list for duplicate values, returning `true` if duplicate values exists and `false` if values are all unique.

Use `count()` and `array_unique()` to check `$items` for duplicate values.

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

<br>[⬆ Back to top](#contents)

### head

Returns the head of a list.

Use `reset()` to return the first item in the array.

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

<br>[⬆ Back to top](#contents)

### last

Returns the last element in an array.

Use `end()` to return the last item in the array.

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

<br>[⬆ Back to top](#contents)

### orderBy ![advanced](/advanced.svg)

Sorts a collection of arrays or objects by key.

Uses `sort()` on the provided array to sort the array vased on `$order` and `$attr`.

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

<br>[⬆ Back to top](#contents)

### pluck

Retrieves all of the values for a given key.

Use `array_map()` to map each object in the `$items` array to the provided `$key`.

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

<br>[⬆ Back to top](#contents)

### pull

Mutates the original array to filter out the values specified.

Use `array_values()` and `array_diff()` to remove the specified values from `$items`.

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

<br>[⬆ Back to top](#contents)

### reject

Filters the collection using the given callback.

Use `array_values()`, `array_diff()` and `array_filter()` to filter `$items` based on `$func`.

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

<br>[⬆ Back to top](#contents)

### remove

Removes elements from an array for which the given function returns `false`.

Use `array_filter()` to find array elements that return truthy values and `array_diff_keys()` to remove the elements not contained in `$filtered`.

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

<br>[⬆ Back to top](#contents)

### rotate

Rotates the array (in left direction) by the number of shifts.

Given the `$shift` index, merge the array values after `$shift` with the values before `$shift`.

```php
function rotate($array, $shift = 1)
{
  for ($i = 0; $i < $shift; $i++) {
    array_push($array, array_shift($array));
  }

  return $array;
}
```

<details>
<summary>Examples</summary>

```php
rotate([1, 3, 5, 2, 4]); // [3, 5, 2, 4, 1]
rotate([1, 3, 5, 2, 4], 2); // [5, 2, 4, 1, 3]
```
</details>

<br>[⬆ Back to top](#contents)

### tail

Returns all elements in an array except for the first one.

Use `array_slice()` and `count()` to return all the items in the array except for the first one.

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

<br>[⬆ Back to top](#contents)

### take

Returns an array with `$n` elements removed from the beginning.

Use `array_slice()` to remove `$n` items from the beginning of the array.

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

<br>[⬆ Back to top](#contents)

### without

Filters out the elements of an array, that have one of the specified values.

Use `array_values()` and `array_diff()` to remove any values in `$params` from `$items`.

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

<br>[⬆ Back to top](#contents)

---

## 🎛️ Function


### compose

Return a new function that composes multiple functions into a single callable.

Use `array_reduce()` to perform right-to-left function composition. 

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

<br>[⬆ Back to top](#contents)

### curry ![advanced](/advanced.svg)

Curries a function to take arguments in multiple calls.

If the number of provided arguments (`$args`) is sufficient, call the passed function, `$function`.
Otherwise, return a curried function that expects the rest of the arguments.

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

<br>[⬆ Back to top](#contents)

### memoize ![advanced](/advanced.svg)

Returns the memoized (cached) function.

Create an empty cache by instantiating a new array. 
Return a function which takes a single argument to be supplied to the memoized function by first checking if the function's output for that specific input value is already cached, or store and return it if not. 
Allow access to the cache by setting it as a property on the returned function.

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

<br>[⬆ Back to top](#contents)

### once

Call a function only once.

Return a function, which only calls the provided function, `$function`, if `$called` is `false` and sets `$called` to `true`.

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

<br>[⬆ Back to top](#contents)

---

## ➗ Math


### approximatelyEqual

Checks if two numbers are approximately equal to each other.

Use `abs()` to compare the absolute difference of the two values to `$epsilon`. 
Omit the third parameter, `$epsilon`, to use a default value of `0.001`.

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

<br>[⬆ Back to top](#contents)

### average

Returns the average of two or more numbers.

Use `array_sum()` for all the values in `$items` and return the result divided by their `count()`.

```php
function average(...$items)
{
  $count = count($items);
  
  return $count === 0 ? 0 : array_sum($items) / $count;
}
```

<details>
<summary>Examples</summary>

```php
average(1, 2, 3); // 2
```
</details>

<br>[⬆ Back to top](#contents)

### clampNumber

Clamps `$num` within the inclusive range specified by the boundary values `$a` and `$b`.

If `$num` falls within the range, return `$num`. 
Otherwise, return the nearest number in the range, using `min()` and `max()`.

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

<br>[⬆ Back to top](#contents)

### factorial

Calculates the factorial of a number.

Use recursion.
If `$n` is less then or equal to `1`, return `1`.
Otherwise, return the product of `$n` and the factorial of `$n -1`.
Throws an exception if `$n` is a negative number.

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

<br>[⬆ Back to top](#contents)

### fibonacci

Generates an array, containing the Fibonacci sequence, up until the nth term.

Create an empty array, initializing the first two values (`0` and `1`).
Loop from 2 through `$n` and add values into the array, using the sum of the last two values.

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

<br>[⬆ Back to top](#contents)

### gcd

Calculates the greatest common divisor between two or more numbers.

Use recursion.
Use `array_reduce()` with the `gcd` function to appy to all elements in the `$numbers` list.
Base case is when `y` equals `0`. In this case, return `x`. 
Otherwise, return the gcd of `y` and the remainder of the division `x/y`.

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

<br>[⬆ Back to top](#contents)

### isEven

Returns `true` if the given number is even, `false` otherwise.

Checks whether a number is odd or even using the modulo (`%`) operator. 
Returns `true` if the number is even, `false` if the number is odd.

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

<br>[⬆ Back to top](#contents)

### isPrime

Checks if the provided integer is a prime number.

Check numbers from `2` to the square root of the given number. 
Return `false` if any of them divides the given number, else return `true`, unless the number is less than `2`.

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

<br>[⬆ Back to top](#contents)

### lcm

Returns the least common multiple of two or more numbers.

Use the greatest common divisor (GCD) formula and the fact that `lcm(x,y) = x * y / gcd(x,y)` to determine the least common multiple. 
The GCD formula uses recursion.

```php
function lcm(...$numbers)
{
  $ans = $numbers[0];
  for ($i = 1, $max = count($numbers); $i < $max; $i++) {
    $ans = (($numbers[$i] * $ans) / gcd($numbers[$i], $ans));
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

<br>[⬆ Back to top](#contents)

### maxN

Returns the maximum value from the provided array.

Use `array_filter()` and `max()` to find the maximum value in an array.

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

<br>[⬆ Back to top](#contents)

### median

Returns the median of an array of numbers.

Find the middle of the array, use `sort()` to sort the values. 
Return the number at the midpoint if the array's length is odd, otherwise the average of the two middle numbers.

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

<br>[⬆ Back to top](#contents)

### minN

Returns the minimum value from the provided array.

Use `array_filter()` and `min()` to find the minimum value in an array.

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

<br>[⬆ Back to top](#contents)

---

## 📜 String


### countVowels

Returns number of vowels in the provided string.

Use a regular expression to count the number of vowels (`a`, `e`, `i`, `o` and `u`a) in a string.

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

<br>[⬆ Back to top](#contents)

### decapitalize

Decapitalizes the first letter of a string.

Decapitalizes the first letter of the string and then adds it with rest of the string. 
Omit the `$upperRest` parameter to keep the rest of the string intact, or set it to `true` to convert to uppercase.

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

<br>[⬆ Back to top](#contents)

### endsWith

Checks if a string is ends with a given substring.

Use `strrpos()` in combination with `strlen` to find the position of `$needle` in `$haystack`.

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

<br>[⬆ Back to top](#contents)

### firstStringBetween

Returns the first string there is between the strings from the parameter `$start` and `$end`.

Use `trim()` and `strstr()` to find the string contained between `$start` and `$end`.

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

<br>[⬆ Back to top](#contents)

### isAnagram

Compare two strings and returns `true` if both strings are anagram, `false` otherwise.

Use `count_chars()` to compare `$string1` and `$string2`.

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

<br>[⬆ Back to top](#contents)

### isContains

Check if a word / substring exists in a given string input.

Using `strpos()` to find the position of the first occurrence of a substring in a string. 

```php
function isContains($string, $needle)
{
  return strpos($string, $needle) === false ? false : true;
}
```

<details>
<summary>Examples</summary>

```php
isContains('This is an example string', 'example'); // true
isContains('This is an example string', 'hello'); // false
```
</details>

<br>[⬆ Back to top](#contents)

### isLowerCase

Returns `true` if the given string is lower case, `false` otherwise.

Convert the given string to lower case, using `strtolower` and compare it to the original.

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

<br>[⬆ Back to top](#contents)

### isUpperCase

Returns `true` if the given string is upper case, false otherwise.

Convert the given string to upper case, using `strtoupper` and compare it to the original.

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

<br>[⬆ Back to top](#contents)

### palindrome

Returns `true` if the given string is a palindrome, `false` otherwise.

Check if the value of `strrev($string)` is equal to the passed `$string`.

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

<br>[⬆ Back to top](#contents)

### shorten

Returns a shortened string.

Use `mb_strlen()`, `mb_substr()` and `rtrim()` to shorten a string to a give number of characters.

```php
function shorten($input, $length = 100, $end = '...')
{
  if (mb_strlen($input) <= $length) {
    return $input;
  }

  return rtrim(mb_substr($input, 0, $length, 'UTF-8')) . $end;
}
```

<details>
<summary>Examples</summary>

```php
shorten('The quick brown fox jumped over the lazy dog', 15); // The quick brown...
```
</details>

<br>[⬆ Back to top](#contents)

### startsWith

Check if a string starts with a given substring.

Use `strpos()` to find the position of `$needle` in `$haystack`.

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

<br>[⬆ Back to top](#contents)

## Credits

* This README is built using the [30 seconds starter template](https://github.com/30-seconds/30-seconds-starter).
