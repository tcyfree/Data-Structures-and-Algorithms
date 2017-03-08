<?php
/**
 * Created by PhpStorm.
 * User: zb-tcy
 * Date: 2017/3/1
 * Time: 12:27
 */
require_once "Sort.php";
/**
 * 功能：生成有n个元素的随机数组,每个元素的随机范围为[$rangeL, $rangeR]
 * 知识点：rand() 函数生成随机整数。
 * 提示：如果您想要一个介于 10 和 100 之间（包括 10 和 100）的随机整数，请使用 rand (10,100)。
 * 提示：mt_rand() 函数是产生随机值的更好选择，返回结果的速度是 rand() 函数的 4 倍。
 * @param $n
 * @param $rangeL
 * @param $rangeR
 * @return mixed
 */

function generateRandomArray($n, $rangeL, $rangeR)
{
    //容错处理，当$rangeR<$rangeL时，交换它们值
    if ($rangeR < $rangeL) {
        $tmp = $rangeL;
        $rangeL = $rangeR;
        $rangeR = $tmp;
    }

    for ($i = 0; $i < $n; $i++)
            $arr[$i] = mt_rand($rangeL,$rangeR);
        return $arr;
}

/**
 * 功能：生成几乎有序的数组
 * @param $n
 * @param $swapTimes
 * @return mixed
 */
function generateNearlyOrderedArray($n, $swapTimes){

    for($i = 0 ; $i < $n ; $i ++ )
            $arr[$i] = $i;
    //随机挑选几个元素进行交换
    for( $i = 0 ; $i < $swapTimes ; $i ++ )
    {
        $posx = mt_rand()%$n;
        $posy = mt_rand()%$n;
        //交换
        $temp = $arr[$posx];
        $arr[$posx] =  $arr[$posy];
        $arr[$posy] = $temp;
    }
    return $arr;
}
/**
 * 功能：交换数组中两相邻键值对的值
 * @param $arr
 * @param $a
 * @return mixed
 */
function swap($arr,$a)
{
    $temp = $arr[$a];//将a变量赋给临时变量
    $arr[$a] = $arr[$a-1];//然后将b变量赋给a变量
    $arr[$a-1] = $temp;//然后将临时变量temp赋给b变量

    return $arr;
}
/**
 * 功能：交换数组中两键值对的值
 * @param $arr
 * @param $a
 * @param $b
 * @return mixed
 */
function swap_arr($arr,$a,$b)
{
    $temp = $arr[$a];//将a变量赋给临时变量
    $arr[$a] = $arr[$b];//然后将b变量赋给a变量
    $arr[$b] = $temp;//然后将临时变量temp赋给b变量

    return $arr;
}
function testSort($sortName, $arr)
{

    // 记录开始运行时间
    $begintime = microtime(TRUE);
    try{
        $arr = $sortName($arr);
    }catch (Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }
    // 记录结束运行时间
    $endtime = microtime(TRUE);
    $totaltime = ($endtime - $begintime);
    $processTime = number_format($totaltime, 7);
    echo $sortName.':'.$processTime.'s'.'<br />';
//    print_r($arr);
//    echo '<br />';
    return $arr;
}

/**
 * 功能：判断一个数组是否为升序排序
 * @param $arr
 * @return bool
 */
function isSorted($arr)
{

    for ($i = 0; $i < count($arr)-1; $i++)
            if ($arr[$i] > $arr[$i + 1])
                return false;

    return true;
}