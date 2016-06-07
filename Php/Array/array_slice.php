<?php
/*
 *  array_slice(array,offset,length,preserve);
 *
 *  offset: must int 规定取出元素的开始位置,如果length为正则返回该元素,如果为负,则反向取
 *  length: optional int 返回数组长度
 *  preserve : optional bool 真保留键,假重置间(默认)
 *
 * */

$a = [
    0=>"Dog",
    1=>"Cat",
    2=>"Horse",
    3=>"Bird"
];

print_r(array_slice($a,1,2)); // Cat , Horse
echo '<hr>';

print_r(array_slice($a,-1,1)); //bird

echo '<hr>';





?>