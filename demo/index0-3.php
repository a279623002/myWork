<?php
$url = 'http://www.hydcd.com/cy/fkccy/index.htm';
$content = get_files_content($url);
$html = preg_replace('/[\t\n\r]+/', '', $content);
// 获取地址列表
$url_list = get_url($html);

// 获取数据
foreach ($url_list as $key => $value) {
    $data[$key] = get_list($url_list[$key]);
}
echo '<pre>';
print_r($data);
echo '</pre>';

function get_files_content($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($curl);
    curl_close($curl);
    return $data;
}

function get_url($html) {
    preg_match_all('/\.htm\">(\d+?)<\/a>/', $html, $page);
    
    $url_page[0] = 'http://www.hydcd.com/cy/fkccy/index.htm';
    for ($i=1; $i < count($page[1]) +1; $i++) { 
        $url_page[$i] = 'http://www.hydcd.com/cy/fkccy/index'.($i + 1).'.htm';
    }
    return $url_page;
}

function get_list($url) {
    $content = get_files_content($url);
    $html = preg_replace('/[\t\n\r]+/', '', $content);
    
    
    preg_match_all('/<td width="170" height="210">(.*?)<\/td>/', $html, $trData);
    
    foreach ($trData[1] as $key => $value) {
        preg_match_all('/<img border="0" src="(.*?)" alt="(.*?)">/', $trData[1][$key], $item);
      
        if(!empty($item[1][0]) && !empty($item[2][0])) {
            $items[$key][] = 'http://www.hydcd.com/cy/fkccy/'.$item[1][0];
            $items[$key][] = $item[2][0];
        }
    }
    return $items;
}