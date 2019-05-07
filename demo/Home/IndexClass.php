<?php
namespace Home\Index;

use \Home\User\UserClass;

class IndexClass extends UserClass
{
    private $is_login;
    private $userList;

    public function __construct()
    {
        $User = new UserClass();
        $userList = $User->userList();
        if (!empty($userList)) {
            $this->userList = $userList;
            $this->is_login = true;
        } else {
            $this->is_login = false;
        }
    }

    public function isLogin()
    {
        $is_login = $this->is_login;
        $userList = $this->userList;
        if ($is_login) {
            echo '已登录！';
            echo '<pre>';
            print_r($userList);
            echo '</pre>';
        } else {
            echo '未登录！';
        }
    }

}