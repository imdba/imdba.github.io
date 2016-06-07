<?php

/*
 * array_flip($arr)
 *
 * 交换array中的key和value的位置,如果value相同,则保留最后一个value
 *
 * return $arr;
 * */

$arr = [
    'a' => 'dog',
    'b' => 'cat',
    'c' => 'pig',
    'd' => 'dog'
];

$arr = array_flip($arr);
print_r($arr);
//Array ( [dog] => d [cat] => b [pig] => c )

?>