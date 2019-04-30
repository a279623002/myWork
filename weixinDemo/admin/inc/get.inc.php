<?php
function getTxt($code) {
    if ($code == 'zero') {
        $url = '../demo.txt';
        $txt = file_get_contents($url);
        $data = explode(',', $txt);
        $result = array('state'=>true, 'data'=>$data);
    }else {
        $result = array('state'=>false, 'msg'=>'code码不正确!');
    }

    exit(json_encode($result));
}

// 防止跨域调用
$refer = $_SERVER['HTTP_REFERER'];  
if($refer){  
    $url = parse_url($refer);  
    if ($url['host'] != 'xhbup.com') {  
            exit('拒绝访问！');  
    }else {
        if(isset($_GET['code'])){
            getTxt($_GET['code']);
        }
    }   
}  