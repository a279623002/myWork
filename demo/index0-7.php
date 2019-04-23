<?php
header('Content-type:text/html;charset=utf-8');

function setTxt($str) {
    //要创建的两个文件
    $TxtFileName = "demo.txt";
    //以读写方式打写指定文件，如果文件不存则创建
    if( ($TxtRes=fopen ($TxtFileName,"w+")) === FALSE){
        // echo("创建可写文件：".$TxtFileName."失败");
        // exit();
        return array('state'=>false, 'msg'=>'失败');
    }
    echo ("创建可写文件".$TxtFileName."成功！</br>");
    $StrConents = $str;//要 写进文件的内容
    if(!fwrite ($TxtRes,$StrConents)){ //将信息写入文件
        echo ("尝试向文件".$TxtFileName."写入".$StrConents."失败！");
        return array('state'=>false, 'msg'=>'失败');
    }
    echo ("尝试向文件".$TxtFileName."写入".$StrConents."成功！");
    fclose ($TxtRes); //关闭指针
    return array('state'=>true, 'msg'=>'失败');
}

function getTxt($code) {
    if ($code == 'zero') {
        $url = './demo.txt';
        $txt = file_get_contents($url);
        $data = explode(',', $txt);
        $result = array('state'=>true, 'data'=>$data);
    }else {
        $result = array('state'=>false, 'msg'=>'code码不正确!');
    }

    exit(json_encode($result));
}

if(isset($_POST['text'])){
    $arr = setTxt($_POST['text']);
    echo $_POST['text'];
}
if(isset($_GET['code'])){
    getTxt($_GET['code']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="./js/jquery-2.1.1.min.js"></script>
</head>
<body>
    <form id="taskForm" method="post">
        <?php
            $url = './demo.txt';
            $weixin = file_get_contents($url);
            echo "<input type='text' name='text' value='{$weixin}'>";
        ?>
        <button>提交</button>
    </form>
    <button id="getTxt">获取</button>
    <script>
        $('#taskForm button').click(function(){              
            $.ajax({
                url: './index0-7.php',
                type: 'post',
                dataType: 'json',
                data: $("#taskForm").serialize(),
                success: function (data) {
                    if (data.state) {
                        alert(data.msg)
                    } else {
                        alert(data.msg);
                    }
                }
            });  
        });
        $('#getTxt').click(function(){              
            $.ajax({
                url: './index0-7.php',
                type: 'get',
                dataType: 'json',
                data: {'code':'zero'},
                success: function (data) {
                    if (data.state) {
                        alert(data.data)
                    } else {
                        alert(data.msg);
                    }
                }
            });  
        });
    </script>
</body>
</html>