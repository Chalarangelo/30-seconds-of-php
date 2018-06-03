# 30 seconds of php code
> A curated collection of useful PHP snippets that you can understand in 30 seconds or less.

## Table of Contents

### 📚 Array

<details>
<summary>View contents</summary>

* [`all`](#all)
* [`any`](#any)
* [`chunk`](#chunk)
* [`flatten`](#flatten)
* [`deepFlatten`](#deepflatten)
* [`findLast`](#findlast)
* [`findLastIndex`](#findlastindex)
* [`head`](#head)
* [`tail`](#tail)
* [`last`](#last)
* [`pull`](#pull)
* [`pluck`](#pluck)
* [`reject`](#reject)
* [`remove`](#remove)
* [`take`](#take)
* [`without`](#without)
* [`hasDuplicates`](#hasduplicates)
* [`groupBy`](#groupby)

</details>

### ➗ Math

<details>
<summary>View contents</summary>

* [`average`](#average)
* [`factorial`](#factorial)
* [`fibonacci`](#fibonacci)
* [`gcd`](#gcd)
* [`lcm`](#lcm)
* [`isEven`](#iseven)
* [`isPrime`](#isprime)
* [`median`](#median)

</details>

---
 ## 📚 Array

### all


```php
function all($items, $func)
{
    return (bool) array_product(array_map($func, $items));
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


```php
function any($items, $func)
{
    return in_array(true, array_map($func, $items));
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

### flatten


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

### deepFlatten


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

### head


```php
function head($items)
{
    return $items[0];
}
```

<details>
<summary>Examples</summary>

```php
head([1, 2, 3]); // 1
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### tail


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

### last


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

### pull


```php
function pull($items, ...$params)
{
    return array_values(array_diff($items, $params));
}
```

<details>
<summary>Examples</summary>

```php
pull(['a', 'b', 'c', 'a', 'b', 'c'], 'a', 'c'); // ['b', 'b']
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### pluck


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

### reject


```php
function reject($func, $items)
{
    return array_values(array_diff($items, array_filter($items, $func)));
}
```

<details>
<summary>Examples</summary>

```php
reject(function ($item) {
    return strlen($item) > 4;
}, ['Apple', 'Pear', 'Kiwi', 'Banana']); // ['Pear', 'Kiwi']
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### remove


```php
function remove($items, $func)
{
    $keys = array_keys(array_filter($items, $func));

    foreach ($keys as $key) {
        unset($items[$key]);
    }

    return $items;
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

### take


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

### hasDuplicates

```php
function hasDuplicates($items)
{
    return count($items) !== count(array_unique($items));
}
```

<details>
<summary>Examples</summary>

```php
hasDuplicates([1, 2, 3, 4, 5, 5]); // true
```

</details>

<br>[⬆ Back to top](#table-of-contents)

### groupBy


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
groupBy(['one', 'two', 'three'], 'strlen') // [3 => ['one', 'two'], 5 => ['three']]
```

</details>

<br>[⬆ Back to top](#table-of-contents)

---
 ## ➗ Math

### average


```php
function average(...$items)
{
    return array_sum($items) / count($items);
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


```php
function fibonacci($n)
{
    $sequence = [0, 1];

    for ($i = 0; $i < $n - 2; $i++) {
        array_push($sequence, array_sum(array_slice($sequence, -2, 2, true)));
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

### lcm - todo


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

### isPrime


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

### isEven


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

### median


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

#### Related

- [30 Seconds of Code](https://github.com/Chalarangelo/30-seconds-of-code)
- [30 Seconds of Python](https://github.com/kriadmin/30-seconds-of-python-code)

## License

This project is licensed under the CC0 1.0 License - see the [License File](LICENSE) for details
