<?php
/**
 * Created by PhpStorm.
 * User: zb-tcy
 * Date: 2017/3/1
 * Time: 13:46
 */
require_once "Helper.php";

$n = 100;

echo '测试1 一般测试'.'<br />';
$rangeL = 100;
$rangeR = 9999;
$sortName = 'selectionSort';
$arr = generateRandomArray($n,$rangeL,$rangeR);
$arr2 = $arr;
print_r('判断一个数组是否有序：'.isSorted(testSort($sortName, $arr)));

echo '<br />';
echo '<br />';

$sortName = 'insertionSort';
print_r('判断一个数组是否有序：'.isSorted(testSort($sortName, $arr2)));

echo '<br />';
echo '<br />'.'测试2 有序性更强的测试'.'<br />';

$rangeL = 0;
$rangeR = 3;
$sortName = 'selectionSort';
$arr = generateRandomArray($n,$rangeL,$rangeR);
$arr2 = $arr;
print_r('判断一个数组是否有序：'.isSorted(testSort($sortName, $arr)));

echo '<br />';
echo '<br />';

$sortName = 'insertionSort';
print_r('判断一个数组是否有序：'.isSorted(testSort($sortName, $arr2)));
echo '<br />';
echo '<br />'.'测试3 测试近乎有序的数组'.'<br />';
$swapTimes = 10;
$sortName = 'selectionSort';
$arr = generateNearlyOrderedArray($n,$swapTimes);
$arr2 = $arr;
print_r('判断一个数组是否有序：'.isSorted(testSort($sortName, $arr)));

echo '<br />';
echo '<br />';

$sortName = 'insertionSort';
print_r('判断一个数组是否有序：'.isSorted(testSort($sortName, $arr2)));