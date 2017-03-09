# Algorithms
算法及优化分析思路  

1、目前有选择排序，插入排序、快速排序  
2、改进的排序有插入排序和快些排序如：  


/**
    &#160;\* 插入排序：寻找元素arr[i]合适的插入位置，使索引数组索引为[i]之前的元素有序  
    &#160;\* 插入排序的时间复杂度分析。  
    &#160;\* 在最坏情况下，数组完全逆序，插入第2个元素时要考察前1个元素，插入第3个元素时，要考虑前2个元素，……，插入第N个元素，要考虑前 N - 1 个元素。  
    &#160;\* 因此，最坏情况下的比较次数是 1 + 2 + 3 + ... + (N - 1)，等差数列求和，结果为 N^2 / 2，所以最坏情况下的复杂度为 O(N^2)。  
    &#160;\* 最好情况下，数组已经是有序的，每插入一个元素，只需要考查前一个元素，因此最好情况下，插入排序的时间复杂度为O(N)。  
   
    &#160;\*/

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
        
 /**
 \* 快速排序
 \* @param array $array
 \* @return array
 
 \*/      
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

    //写法2，随机选择一个值作为标尺，提高递归树的平衡度
//    $arr = swap_arr($arr,0, mt_rand()%$length);
//    $base_num = $arr[0];