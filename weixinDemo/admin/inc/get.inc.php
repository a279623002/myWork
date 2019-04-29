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


if(isset($_GET['code'])){
    getTxt($_GET['code']);
}
