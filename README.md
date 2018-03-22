一、文件说明
=============

## 1.1 辅助函数文件Helper.php 



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