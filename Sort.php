<?php
require_once "Helper.php";

/**
 * 选择排序：每次找剩下最小元素，每次交换一对元素。
 *
 * @param $arr
 * @return mixed
 */
function selectionSort($arr){

    for($i = 0 ; $i < count($arr) ; $i ++){

        $minIndex = $i;
        for( $j = $i + 1 ; $j < count($arr) ; $j ++ )
            if( $arr[$j] < $arr[$minIndex] )
                $minIndex = $j;
        //交换
        swap($arr[$minIndex],$arr[$i]);
    }

    return $arr;
}

/**
 * 插入排序：寻找元素arr[i]合适的插入位置，使索引数组中下标为'i'之前的元素有序
 *
 * @param $arr
 * @return mixed
 */
function insertionSort($arr)
{
    for( $i = 1 ; $i < count($arr) ; $i ++ ) {

        // 寻找元素arr[i]合适的插入位置
        // 写法1
//        for( $j = $i ; $j > 0 ; $j-- ){
//            if( $arr[$j] < $arr[$j-1] )
//                swap($arr[$j-1],$arr[$j]);
//            else
//                break;
//        }

        // 写法2,插入排序和选择排序最大区别是插入排序可以提前结束 # 写法2比写法1简洁
//        for( $j = $i ; $j > 0 && $arr[$j] < $arr[$j-1]; $j -- ){
//            swap( $arr[$j-1],$arr[$j]);
//        }

        //（推荐）写法3,保存副本，通过赋值取代交换，减少交换赋值次数，（上两种写法交换一次会有三次赋值），提升性能
        // (性能比前面写法高5倍左右)
        $e = $arr[$i];//
        for ($j = $i; $j > 0 && $arr[$j-1] > $e; $j--)
            $arr[$j] = $arr[$j-1];
        // j保存元素e应该插入的位置
        $arr[$j] = $e;
    }

    return $arr;
}

/**1、寻找元素arr[i]合适的插入位置，用变量记录$arr[$i]的值
 * 2、要是在0~j有比$arr[$i]的值大，将此值后移一个索引
 * 3、将最终j的位置作为$arr[$i]的位置赋值
 * @param $arr
 */
function insertionSort_test($arr){
    for($i=1; $i<count($arr); $i++){
        $base = $arr[$i];
        for($j=$i; $j>0 && $arr[$j-1]>$base; $j--){
            $arr[$j] = $arr[$j-1];
        }
        $arr[$j] = $base;
    }
}

/**
 * 希尔排序
 * 经测试：希尔排序是普通插入排序的50倍,'改进版'插入排序的10倍
 * >> 每一次移动都表示“除以 2”
 *
 * @param $arr
 * @return mixed
 */
function shellSort($arr) {
    for ($gap = count($arr)>>1; $gap > 0; $gap>>=1)
        for ($i = $gap; $i < count($arr); $i++) {
            $temp = $arr[$i];
            for ($j = $i - $gap; $j >= 0 && $arr[$j] > $temp; $j -= $gap)
                $arr[$j + $gap] = $arr[$j];
            $arr[$j + $gap] = $temp;
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

/**
 * !!!!数组初始化和递归调用,return $arr
 * @param $arr
 * @return array|void
 */
function quickSort_test($arr)
{
    $length = count($arr);
    if($length <= 1)
    {
        return $arr;
    }

    $base_num = $arr[0];
    $left = array();
    $right = array();

    for($i=1; $i<$length; $i++)
    {
        if($arr[$i]<$base_num){
            $left[] = $arr[$i];
        }else{
            $right[] = $arr[$i];
        }
    }

    $left = quickSort_test($left);
    $right = quickSort_test($right);

    return array_merge($left,array($base_num),$right);
}