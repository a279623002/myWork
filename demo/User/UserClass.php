<?php
namespace User;

class UserClass
{
    // public:    可以class内部调用，可以实例化调用。可以内部调用，实例调用等
    // private:   可以class内部调用，实例化调用报错。只有在本类中使用
    // protected：  可以class内部调用，实例化调用报错。用于本类和继承类调用
    protected $user;
    // private $user;
    // public $user;

    public function __construct()
    {
        $this->user = array(array('user_id'=>1, 'status'=>true));
    }

    public function userList()
    {
        $user = $this->user;
        if (empty($user)) {
            $user[0] = array('user_id'=>1, 'status'=>false);
        }
        return $user;
    }


}