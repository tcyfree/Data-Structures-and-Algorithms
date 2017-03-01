<?php
require_once "Helper.php";
/**
 * 选择排序：每次找剩下最小元素
 */
function selectionSort($arr){

    for($i = 0 ; $i < count($arr) ; $i ++){

        $minIndex = $i;
        for( $j = $i + 1 ; $j < count($arr) ; $j ++ )
            if( $arr[$j] < $arr[$minIndex] )
                $minIndex = $j;
        //交换
        $temp = $arr[$i];
        $arr[$i] = $arr[$minIndex];
        $arr[$minIndex] = $temp;
    }

    return $arr;
}
/**
 * 插入排序：寻找元素arr[i]合适的插入位置，使索引数组索引为[i]之前的元素有序
 */
function insertionSort($arr)
{

    for( $i = 1 ; $i < count($arr) ; $i ++ ) {

        // 寻找元素arr[i]合适的插入位置
        // 写法1
//        for( $j = $i ; $j > 0 ; $j-- )
//            if( $arr[$j] < $arr[$j-1] )
//                $arr = swap($arr,$j);
//            else
//                break;

        // 写法2,插入排序和选择排序最大区别是插入排序可以提前结束
//        for( $j = $i ; $j > 0 && $arr[$j] < $arr[$j-1] ; $j -- )
//            $arr = swap( $arr,$j);
        // 写法3,减少交换赋值次数（上两种写法交换一次会有三次赋值），提升性能
        $e = $arr[$i];
        for ($j = $i; $j > 0 && $arr[$j-1] > $e; $j--)
            $arr[$j] = $arr[$j-1];
        // j保存元素e应该插入的位置
        $arr[$j] = $e;
    }

    return $arr;
}
