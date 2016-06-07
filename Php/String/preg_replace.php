<?php

/*
 * preg_replace(正则,替换为什么,字符串,长度);
 *
 * */

$rs = [
    ['id'=>3],
    ['id'=>4]
];
foreach($rs as $val){
    $str .= ','.$val['id'];
}
$str = preg_replace('/,/','',$str,1);

echo $str;