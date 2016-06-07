<?php

/*
 *  array_diff($arr1,$arr2,$arr3)
 *  所有的和第一个去比较 , 计算里面差值
 *
 *  获取两个数组的差异
 *  $a = array_diff($arr1,$arr2);
 *  $b = array_diff($arr2,$arr1);
 *  array_merge($a,$b);
 *
 * */

$a1=array(0=>"Cat",1=>"Dog",2=>"Horse");
$a2=array(3=>"Horse",4=>"Dog",5=>"Fish");
print_r(array_diff($a1,$a2));

//Array ( [0] => Cat )


$a1=array(0=>"Fish",1=>"Dog",2=>"Horse");
$a2=array(3=>"Horse",4=>"Dog",5=>"Fish");
print_r(array_diff($a1,$a2)==[]);

$a1=array(0=>"Fish",1=>"Dog");
$a2=array(5=>"Fish");
print_r(array_diff($a1,$a2));


$array1=array('blue','red','green');
$array2=array('blue','yellow','green');

array_merge(array_diff($array1, $array2),array_diff($array2, $array1));

/*Result
------
Array
(
    [0] => red
    [1] => yellow
)*/