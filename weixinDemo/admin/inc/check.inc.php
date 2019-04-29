<?php
$ps = $_POST['ps'];
if (!empty($ps)) {
    if($ps === 'zero279623') {
        session_start();
        $_SESSION['account'] =  'zero';
        $result = array('state'=>true, 'msg'=>'登录成功！');
    }else {
        $result = array('state'=>false, 'msg'=>'密码错误！');
    }
}else {
    $result = array('state'=>false, 'msg'=>'请输入密码！');
}
exit(json_encode($result));

