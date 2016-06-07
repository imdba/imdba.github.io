<?php
/*
 *  range(start,end.step)
 *
 * */
//array(0,1,2,3)
range(0,3);

//array(2,4,6,8)
range(2,8,2);

$rs = 0;
foreach(range(0,100) as $val){
    $rs+=$val;
}
echo $rs;

/*
 * $arr = [
 *    '11'=>1,
 *    '12'=>2,
 *    '13'=>3,
 *    '14'=>4
 * ];
 *
 * */
array_combine(rand(11,14),range(1,3));

$a = array_map(function($n) { return sprintf('sample_%03d', $n); }, range(50, 59) );
/*
Array
(
    [0] => sample_050
    [1] => sample_051
    [2] => sample_052
    [3] => sample_053
    [4] => sample_054
    [5] => sample_055
    [6] => sample_056
    [7] => sample_057
    [8] => sample_058
    [9] => sample_059
)*/
//创建一个 时间插件
$prepend = array('00','01','02','03','04','05','06','07','08','09');
$hours   = array_merge($prepend,range(10, 23));
$minutes = array_merge($prepend,range(10, 59));
$seconds = $minutes;


//range import for excel
function createColumnsArray($end_column, $first_letters = ''){
    $columns = array();
    $length = strlen($end_column);
    $letters = range('A', 'Z');

    // Iterate over 26 letters.
    foreach ($letters as $letter) {
        // Paste the $first_letters before the next.
        $column = $first_letters . $letter;

        // Add the column to the final array.
        $columns[] = $column;

        // If it was the end column that was added, return the columns.
        if ($column == $end_column)
            return $columns;
    }

    // Add the column children.
    foreach ($columns as $column) {
        // Don't itterate if the $end_column was already set in a previous itteration.
        // Stop iterating if you've reached the maximum character length.
        if (!in_array($end_column, $columns) && strlen($column) < $length) {
            $new_columns = createColumnsArray($end_column, $column);
            // Merge the new columns which were created with the final columns array.
            $columns = array_merge($columns, $new_columns);
        }
    }

    return $columns;
}
?>