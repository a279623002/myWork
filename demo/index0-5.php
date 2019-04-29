<?php

$str = 't  est mobi does doeseses1 do
        </br>
        .mobi';
// t制表符，v垂直制表符，f换页符
// $preg = '/\n/';     // 换行符
// $preg = '/\r/';     // 回车符
// $preg = '/\s/';     // 空白字符 等价于 [ \f\n\r\t\v]
// $preg = '/\S/';     // 非空白字符 [^ \f\n\r\t\v]
// $preg = '/mobi$/';     // 匹配结尾的字符
// $preg = '/(bi+)/';     // 匹配前子表达式一次或者多次 只匹配bi
// $preg = '/(bi*)/';     // 匹配前子表达式零次或者多次 匹配bi和b
// $preg = '/(bi?)/';     // 匹配前子表达式零次或者一次
// $preg = '/./';     // 匹配除换行符 \n之外的任何单字符
// $preg = '/^t/';     // 匹配输入字符串的开始位置，除非在方括号表达式中使用，此时它表示不接受该字符集合d
// $preg = '/do(es)?/';     // 匹配前面的子表达式零次或一次。例如，”do(es)?” 可以匹配 “do” 或 “does” 中的”do” 。? 等价于 {0,1}。
// $preg = '/do(es)+/';     // 匹配前面的子表达式一次或多次。例如，’do(es)+’ 能匹配 “does” 以及 “doeses”，但不能匹配 “do”。+ 等价于 {1,}。
$preg = '/do(es)*/';     // 匹配前面的子表达式零次或多次。例如，do(es)* 能匹配 “do” 以及 “does”。* 等价于{0,}。
preg_match_all($preg, $str, $content);
echo '<pre>';
print_r($content);
echo '</pre>';