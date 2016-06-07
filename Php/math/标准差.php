<?php


//标准差公式
function getVariance($avg, $list){
    $total_var = 0;
    foreach ($list as $lv){
        $total_var += pow( ($lv - $avg), 2 );
    }

    return sqrt( $total_var / (count($list) - 1 ) );
}