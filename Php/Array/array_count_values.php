<?php

/*
 * array_count_value($arr)
 *
 * 返回每个值的个数的新数组
 * 以value为key , 以个数为值
 *
 * */

$a=array("Cat","Dog","Horse","Dog");

print_r(array_count_values($a));

//Array ( [Cat] => 1 [Dog] => 2 [Horse] => 1 )