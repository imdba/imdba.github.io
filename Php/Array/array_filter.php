<?php

/*
 *
 * array_filter(array,function)
 *
 * return $arr
 * */

$a = array(0=>"Dog",1=>"Cat",2=>"Horse");
$a = array_filter($a,function($v){
    if ($v==="Horse")
    {
        return true;
    }
    return false;
});
print_r($a);