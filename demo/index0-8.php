<?php
include_once './User/UserClass.php';
use \User\UserClass;

$UserClass = new UserClass();
$list = $UserClass->userList();
echo '<pre>';
// print_r($list);
print_r($UserClass->user);
echo '</pre>';
