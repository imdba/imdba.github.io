<?php

/*
 * array_key_exists(key,array)
 *
 * return bool
 *
 * 另外一种判断方法
 * isset($array['key']) 和 此函数相同
 *
 * 使用场景
 * 1、重复查询相同数据,存放tmp数据,避免重复查询
 * */

$a=array("a"=>"Dog","b"=>"Cat");
if (array_key_exists("a",$a)){
    echo "Key exists!";
}
else{
    echo "Key does not exist!";
}

