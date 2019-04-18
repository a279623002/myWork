<?php
include_once './inc/config.inc.php';
include_once './inc/mysql.inc.php';

$link = connect();
// 全外链接
// $query = "select * from teacher t, student s where t.id = s.tid";
// $query = "select * from teacher t JOIN student s ON t.id = s.tid";
// Array
// (
//     [id] => 1
//     [name] => 啊大
//     [sname] => 啊一
//     [grade] => 23.00
//     [tid] => 1
// )
// Array
// (
//     [id] => 2
//     [name] => 啊二
//     [sname] => 啊二
//     [grade] => 32.00
//     [tid] => 2
// )
// Array
// (
//     [id] => 3
//     [name] => 啊大
//     [sname] => 啊三
//     [grade] => 60.00
//     [tid] => 1
// )
// Array
// (
//     [id] => 4
//     [name] => 啊二
//     [sname] => 啊四
//     [grade] => 59.00
//     [tid] => 2
// )

// 左链接 以左边表为基表
// $query = "select * from teacher t LEFT JOIN student s ON t.id = s.tid";
// Array
// (
//     [id] => 1
//     [name] => 啊大
//     [sname] => 啊一
//     [grade] => 23.00
//     [tid] => 1
// )
// Array
// (
//     [id] => 3
//     [name] => 啊大
//     [sname] => 啊三
//     [grade] => 60.00
//     [tid] => 1
// )
// Array
// (
//     [id] => 2
//     [name] => 啊二
//     [sname] => 啊二
//     [grade] => 32.00
//     [tid] => 2
// )
// Array
// (
//     [id] => 4
//     [name] => 啊二
//     [sname] => 啊四
//     [grade] => 59.00
//     [tid] => 2
// )
// Array
// (
//     [id] => 
//     [name] => 小三
//     [sname] => 
//     [grade] => 
//     [tid] => 
// )

// 右链接
// $query = "select * from teacher t RIGHT JOIN student s ON t.id = s.tid";
// Array
// (
//     [id] => 1
//     [name] => 啊大
//     [sname] => 啊一
//     [grade] => 23.00
//     [tid] => 1
// )
// Array
// (
//     [id] => 2
//     [name] => 啊二
//     [sname] => 啊二
//     [grade] => 32.00
//     [tid] => 2
// )
// Array
// (
//     [id] => 3
//     [name] => 啊大
//     [sname] => 啊三
//     [grade] => 60.00
//     [tid] => 1
// )
// Array
// (
//     [id] => 4
//     [name] => 啊二
//     [sname] => 啊四
//     [grade] => 59.00
//     [tid] => 2
// )

// 左链接 以左边表为基表
// $query = "select * from teacher t LEFT JOIN student s ON t.id = s.tid";
// Array
// (
//     [id] => 1
//     [name] => 啊大
//     [sname] => 啊一
//     [grade] => 23.00
//     [tid] => 1
// )
// Array
// (
//     [id] => 3
//     [name] => 啊大
//     [sname] => 啊三
//     [grade] => 60.00
//     [tid] => 1
// )
// Array
// (
//     [id] => 2
//     [name] => 啊二
//     [sname] => 啊二
//     [grade] => 32.00
//     [tid] => 2
// )
// Array
// (
//     [id] => 4
//     [name] => 啊二
//     [sname] => 啊四
//     [grade] => 59.00
//     [tid] => 2
// )
// 下面右链接因为以student表为基表，最后一条数据会因为student表没数据，而teacher的id与student的id相同，所以会出现如下情况
// Array
// (
//     [id] => 3            //此id为teacher的id
//     [sname] => 
//     [grade] => 
//     [tid] => 
//     [name] => 小三
// )
// $query = "select * from student s RIGHT JOIN teacher t ON t.id = s.tid"; 

// 子链接（将第一次查询的结果，作为一个结果下一次使用）
$query = "select s.id, s.grade, s.sname, s.tid from student s where s.tid in (select t.id from teacher t where t.status = 2)";
// Array
// (
//     [id] => 2
//     [grade] => 32.00
//     [sname] => 啊二
//     [tid] => 2
// )
// Array
// (
//     [id] => 4
//     [grade] => 59.00
//     [sname] => 啊四
//     [tid] => 2
// )
$result = execute($link, $query);

while($data = mysqli_fetch_assoc($result)) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}