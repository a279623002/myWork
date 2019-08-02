<?php


$url = 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1563440437454&di=bb5a02bc6bf2c07fff0890a2ecae7f03&imgtype=0&src=http%3A%2F%2Fimg.mp.itc.cn%2Fupload%2F20160922%2Fbc02010c1b8247c6a8d56519bfb6c368.jpg';

$ch = curl_init();
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); //不验证ssl证书
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$img = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close ($ch);
echo '<pre>';
print_r($info);
echo '</pre>';
file_put_contents('./demo.png', $img);
$size = filesize('./demo.png');
if ($size != $info['size_download']) {
	echo 'nope';
} else {
	echo 'yes';
}