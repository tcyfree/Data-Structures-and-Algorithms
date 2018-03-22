一、文件说明
=============

## 1.1 辅助函数文件 Helper.php 
[Helper.php ](https://github.com/tcyfree/Data-Structures-and-Algorithms/blob/master/Helper.php)


1. 数组交换两个值

    swap(&$x, &$y){}  
    
2. 生成有n个元素的随机数组,每个元素的随机范围为[$rangeL, $rangeR]

    generateRandomArray($n, $rangeL, $rangeR){} 
    
3. 生成几乎有序的数组

    generateNearlyOrderedArray($n, $swapTimes){} 
    
4. 根据排序算法和测试数据调用对应的算法函数并且记录排序时间

    testSort($sortName, $arr){} 
    
5. 判断一个数组是否为升序排序

    isSorted($arr){} 
    
    
## 1.2 排序算法文件 Sort.php    
[Sort.php](https://github.com/tcyfree/Data-Structures-and-Algorithms/blob/master/Sort.php)

1. 选择排序：每次找剩下最小元素，每次交换一对元素。

    selectionSort($arr){} 
    
2. 插入排序：寻找元素arr[i]合适的插入位置，使索引数组中下标为'i'之前的元素有序

    insertionSort($arr){}    

3. 希尔排序：经测试希尔排序是普通插入排序的50倍,'改进版'插入排序的10倍  

    shellSort($arr){}  

## 1.3 测试文件testSort.php
[testSort.php](https://github.com/tcyfree/Data-Structures-and-Algorithms/blob/master/testSort.php)

    
# 未完，陆续会增加其它算法 