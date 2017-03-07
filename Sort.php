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
 * 插入排序的时间复杂度分析。
 * 在最坏情况下，数组完全逆序，插入第2个元素时要考察前1个元素，插入第3个元素时，要考虑前2个元素，……，插入第N个元素，要考虑前 N - 1 个元素。
 * 因此，最坏情况下的比较次数是 1 + 2 + 3 + ... + (N - 1)，等差数列求和，结果为 N^2 / 2，所以最坏情况下的复杂度为 O(N^2)。
 * 最好情况下，数组已经是有序的，每插入一个元素，只需要考查前一个元素，因此最好情况下，插入排序的时间复杂度为O(N)。
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

/**
 * 快速排序
 * @param array $array
 * @return array
 */
function quickSort($arr)
{
    //先判断是否需要继续进行
    $length = count($arr);
    if ($length <= 1) {
        return $arr;
    }
    //优化一，区间内数据较少时直接用另的方法排序以减小递归深度
    if( $length<= 15 ){
        $arr = insertionSort($arr);
        return $arr;
    }
    //写法1，选择一个标尺,通常选择第一个元素
    $base_num = $arr[0];

    //写法2，随机选择一个值作为标尺
//    $arr = swap_arr($arr,0, mt_rand()%$length);
//    $base_num = $arr[0];
    //初始化
    $left = array();//小于标尺的
    $right = array();//大于标尺的

    for ($i = 1; $i < $length; $i++) {
        if ($base_num > $arr[$i]) {
            $left[] = $arr[$i];
        } else {
            $right[] = $arr[$i];
        }
    }

    //递归调用并记录
    $left = quickSort($left);
    $right = quickSort($right);

    //合并
    return array_merge($left, array($base_num), $right);
}
