<?php
namespace Home\Index;

use \Home\User\UserClass;

class IndexClass extends UserClass
{
    private $is_login;

    public function __construct()
    {
        $user = new UserClass();
        if (!empty($user)) {
            $this->is_login = true;
        } else {
            $this->is_login = false;
        }
    }

    public function isLogin()
    {
        $is_login = $this->is_login;
        if ($is_login) {
            echo '已登录！';
        } else {
            echo '未登录！';
        }
    }

}