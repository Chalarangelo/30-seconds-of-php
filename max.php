<?php

$numbers = [1, 2, 3, 4, 5, 5];
$maxValue = max($numbers);
$maxValueArray = array_filter($numbers, function($value) use ($maxValue) {
    return $maxValue === $value;
});

echo count($maxValueArray);

