<?php
/*
 * array_intersect($arr1,$arr2)
 *
 * **/

$a1=array(0=>"Cat",1=>"Dog",2=>"Horse");
$a2=array(3=>"Horse",4=>"Dog",5=>"Fish");
print_r(array_intersect($a1,$a2));

/*
 * result
 * Array ( [1] => Dog [2] => Horse )
 * */
