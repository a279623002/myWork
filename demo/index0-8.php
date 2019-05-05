<?php
header('Content-type:text/html;charset=utf-8;');
include_once './User/UserClass.php';
include_once './User/IndexClass.php';
use \Home\User\UserClass;
use \Home\Index\IndexClass;

$UserClass = new UserClass();
$IndexClass = new IndexClass();
$list = $UserClass->userList();
$is_login = $IndexClass->isLogin();
echo $is_login;
