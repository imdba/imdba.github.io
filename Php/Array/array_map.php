<?php
/*
 * array_map(function,array1,arrray2)
 *
 * function 可以为一个自定义函数,也可以是一个php函数
 *
 * reset() http://php.net/manual/zh/function.reset.php
 *         将array 的内部指针倒回到第一个单元并返回第一个数组单元的值。
 * */

$rs = [
    ['id'=>3,'name'=>'zh'],
    ['id'=>4,'name'=>'jy']
];

$str = implode(',',array_map('reset',$rs));
echo $str;

function myfunction($v)
{
    if ($v==="Dog")
    {
        return "Fido";
    }
    return $v;
}
$a=array("Horse","Dog","Cat");
print_r(array_map("myfunction",$a));

//3,4
