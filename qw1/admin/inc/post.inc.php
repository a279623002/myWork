<?php
$str = $_POST['content'];
if (!empty($str)) {
    setTxt($str);
} else {
    exit(json_encode(array('state'=>false, 'msg'=>'失败')));
}
function setTxt($str) {
    //要创建的两个文件
    $TxtFileName = "../demo.txt";
    //以读写方式打写指定文件，如果文件不存则创建
    if( ($TxtRes=fopen ($TxtFileName,"w+")) === FALSE){
        // echo("创建可写文件：".$TxtFileName."失败");
        // exit();
        exit(json_encode(array('state'=>false, 'msg'=>'失败')));
    }
    // echo ("创建可写文件".$TxtFileName."成功！</br>");
    $StrConents = $str;//要 写进文件的内容
    if(!fwrite ($TxtRes,$StrConents)){ //将信息写入文件
        // echo ("尝试向文件".$TxtFileName."写入".$StrConents."失败！");
        exit(json_encode(array('state'=>false, 'msg'=>'失败')));
    }
    // echo ("尝试向文件".$TxtFileName."写入".$StrConents."成功！");
    fclose ($TxtRes); //关闭指针
    exit(json_encode(array('state'=>true, 'msg'=>'成功')));
}
