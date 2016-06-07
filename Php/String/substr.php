<?php

/*
 * substr(截取的字符串,长度);
 *
 * 返回被截取后的字符串
 * */

$str = '';
$rs = [
    ['id'=>3],
    ['id'=>4]
];
foreach($rs as $val){
    $str .= ','.$val['id'];
}
$str = substr($str,1);

echo $str;