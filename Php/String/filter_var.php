<?php

/*
 * filter_var(variable, filter, options)
 *
 * variable	必需。规定要过滤的变量。
 * filter	可选。规定要使用的过滤器的 ID。
 * options	规定包含标志/选项的数组。检查每个过滤器可能的标志和选项。
 *
 *  FILTER_CALLBACK	调用用户自定义函数来过滤数据。
 *  FILTER_SANITIZE_STRING	去除标签，去除或编码特殊字符。
 *  FILTER_SANITIZE_STRIPPED	"string" 过滤器的别名。
 *  FILTER_SANITIZE_ENCODED	URL-encode 字符串，去除或编码特殊字符。
 *  FILTER_SANITIZE_SPECIAL_CHARS	HTML 转义字符 '"<>& 以及 ASCII 值小于 32 的字符。
 *  FILTER_SANITIZE_EMAIL	    删除所有字符，除了字母、数字以及 !#$%&'*+-/=?^_`{|}~@.[]
 *  FILTER_SANITIZE_URL	        删除所有字符，除了字母、数字以及 $-_.+!*'(),{}|\\^~[]`<>#%";/?:@&=
 *  FILTER_SANITIZE_NUMBER_INT	删除所有字符，除了数字和 +-
 *  FILTER_SANITIZE_NUMBER_FLOAT删除所有字符，除了数字、+- 以及 .,eE。
 *  FILTER_SANITIZE_MAGIC_QUOTES应用 addslashes()。
 *  FILTER_UNSAFE_RAW	        不进行任何过滤，去除或编码特殊字符。
 *  FILTER_VALIDATE_INT	        在指定的范围以整数验证值。
 *  FILTER_VALIDATE_BOOLEAN	    如果是 "1", "true", "on" 以及 "yes"，则返回 true，如果是 "0", "false", "off", "no" 以及 ""，则返回 false。否则返回 NULL。
 *  FILTER_VALIDATE_FLOAT	    以浮点数验证值。
 *  FILTER_VALIDATE_REGEXP	    根据 regexp，兼容 Perl 的正则表达式来验证值。
 *  FILTER_VALIDATE_URL	        把值作为 URL 来验证。
 *  FILTER_VALIDATE_EMAIL	    把值作为 e-mail 来验证。
 *  FILTER_VALIDATE_IP	        把值作为 IP 地址来验证。
 *
 * */

//验证邮箱
if(!filter_var("someone@example....com", FILTER_VALIDATE_EMAIL)) {
    echo("E-mail is not valid");
}
else {
    echo("E-mail is valid");
}