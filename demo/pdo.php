<?php
header('Content-Type: text/html; charset=utf8');
try {
    $dsn = 'mysql: host=localhost; dbname=demo';
    $db = new PDO($dsn, 'root', 'root');

    // 构造方法
    $db->setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
    $db->exec("SET NAMES 'UTF8'");
    $addtime = time();
    // $sql = "INSERT INTO pdo_log (name, content, ip, datetime) values('zero', '记录1', '{$_SERVER['REMOTE_ADDR']}', '{$addtime}')";
    // $result = $db->exec($sql);
    // 预处理语句
    $insert = $db->prepare("INSERT INTO pdo_log (name, content, ip, datetime) values(?, ?, ?, '{$addtime}')");
    $insert->execute(array('z', '记录2', "{$_SERVER['REMOTE_ADDR']}"));
    $sql = "SELECT * FROM pdo_log";
    $query = $db->prepare($sql);
    $query->execute();
    echo '<pre>';
    print_r($query->fetchAll(PDO::FETCH_ASSOC));
    echo '</pre>';
} catch (PDOException $err) {
    echo $err->getMessage();
}