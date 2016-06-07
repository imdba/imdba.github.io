<?php

/*
 *
 * array_chunk($arr,$size);
 *
 * 返回 根据当前size切分的$arr的二维数组
 *
 * */
$input_array = array('a', 'b', 'c', 'd', 'e');
print_r(array_chunk($input_array, 2));
print_r(array_chunk($input_array, 2, true));

/*
return
Array
(
    [0] => Array
    (
        [0] => a
            [1] => b
        )

    [1] => Array
(
    [0] => c
            [1] => d
        )

    [2] => Array
(
    [0] => e
)

)
Array
(
    [0] => Array
    (
        [0] => a
            [1] => b
        )

    [1] => Array
(
    [2] => c
            [3] => d
        )

    [2] => Array
(
    [4] => e
)

)
*/