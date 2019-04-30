<?php
header('Content-type:text/html;charset=utf-8');

// 本地访问IP
$ip_self = gethostbyname(null);
echo $ip_self;

echo "<br />";

// 用户访问IP
$ip_addr = $_SERVER['REMOTE_ADDR'];
echo $ip_addr;



echo "<br />";
$city = getCity($ip_addr);
echo "<pre>";
print_r($city);
echo "</pre>";

/**
 * 获取 IP  地理位置
 * 淘宝IP接口
 * @Return: array
 */
function getCity($ip = '')
{
    if($ip == ''){
        $url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json";
        $ip=json_decode(file_get_contents($url),true);
        $data = $ip;
    }else{
        $url = "http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
        $ip=json_decode(file_get_contents($url));   
        if((string)$ip->code=='1'){
           return false;
        }
        $data = (array)$ip->data;
    }
    
    return $data;   
}
