<?php
header('Content-type:text/html;charset=utf-8');
$MyFile = new MyFile();
$MyFile->setFile('file.txt', 'this is a test');
$content = $MyFile->getFile();
echo '<pre>';
print_r($content);
echo '</pre>';

class MyFile
{
    private $src;

    public function setFile($name, $text)
    {
        ini_set('date.timezone','Asia/Shanghai');
        $src = './file/'.$name;
        $this->src = $src;
        $size = 668;
        if (file_exists($src) and abs(filesize($src)) > $size) {
            unlink($src);
        }
        file_put_contents($src, date('Y-m-d H:i:s', time())."\n\r".$text."\n\r", FILE_APPEND);
    }

    public function getFile()
    {
        $src = $this->src;
        if (file_exists($src)) {
            $content = file_get_contents($src);
        } else {
            $content = '文件不存在';
        }
        return $content;
    }
}

