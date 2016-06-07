<?php

/*
 * array_walk(数组,函数)
 * 会根据你的数组的每一次循环,并且将其位一个参数传入函数中
 *
 * 返回值为boolen
 * */

$start = microtime(true);

$rs = [
    ['id'=>3,'name'=>'zh'],
    ['id'=>4,'name'=>'jy']
];
array_walk($rs,function(&$data){
    $data = $data['id'];
});
$rs=implode(',',$rs);
$end = microtime(true);

echo ($end-$start),PHP_EOL;
echo $rs;