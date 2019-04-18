<?php
$url = 'http://www.hydcd.com/cy/fkccy/index.htm';
$content = get_files_content($url);
$html = str_replace('\n\r\s', '', $content);


// $url_arr = get_url($html);
// echo '<pre>';
// print_r($url_arr);
// echo '</pre>';

preg_match_all('/<td width="170" height="210">(.*?)<\/td>/', $html, $trData);
echo '<pre>';
print_r($trData);
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
    for ($i=0; $i < count($page[1]) + 1; $i++) { 
        $url_page[$i] = 'http://www.hydcd.com/cy/fkccy/index'.($i + 1).'.htm';
    }
    return $url_page;
}