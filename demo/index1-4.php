<?php

$url = 'http://localhost/mywork/demo/inc/post.inc.php';
$data = array(
    'name'      => 'zero',
    'method'    => 'post',
    'function'  => 'curl',
    'img'       => '@D:/phpStudy/WWW/myWork/demo/images/demo.png' // 文件绝对路径前加@
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$content = curl_exec($ch);
curl_close($ch);
echo $content;