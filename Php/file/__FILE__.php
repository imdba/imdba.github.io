<?php
/*
 *
 * dirname(__FILE__)
    php中定义了一个很有用的常数，即

    __file__

    这个内定常数是当前php程序的就是完整路径（路径+文件名）。

    即使这个文件被其他文件引用(include或require)，__file__始终是它所在文件的完整路径，而不是引用它的那个文件完整路径。

    请看下面例子：
    /home/data/demo/test/a.php
 * */
$the_full_name=__FILE__;
$the_dir=dirname(__FILE__);
echo $the_full_name; //返回/home/data/demo/test/a.php
echo $the_dir;            //返回/home/data/demo/test