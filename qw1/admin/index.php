<?php
header('Content-type:text/html;charset=utf-8');
session_start();
$account = $_SESSION['account'];
if (empty($account)) header('location:./login.html');



function getTxt($code) {
    if ($code == 'zero') {
        $url = './demo.txt';
        $txt = file_get_contents($url);
        $data = explode(',', $txt);
        $result = array('state'=>true, 'key'=>$data[0], 'value'=>$data[1]);
    }else {
        $result = array('state'=>false, 'msg'=>'code码不正确!');
    }

    exit(json_encode($result));
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
    <style>
                body {
            background: black;
        }

        main {
            width: 90%;
            margin: 50px auto 0 auto;
        }

        form {
            width: 90%;
            padding: 5%;
            border: 1px solid rgb(255, 0, 0, .5);
        }

        main form label {
            display: block;
            width: 100%;
            color: #FFF;
            text-align: center;
        }

        main form input {
            width: 100%;
            display: block;
            margin: 10% auto;
            height: 20px;
            line-height: 20px;
            text-align: center;
        }

        main form button {
            width: 100px;
            background: skyblue;
            color: #FFF;
            height: 30px;
            border: 1px solid yellow;
            border-radius: 5px;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <main>
        <form action="" id="taskForm">
            <label>参数,值</label>
            <?php
                $url = './demo.txt';
                $content = file_get_contents($url);
                echo "<input type='text' name='content' value='{$content}'>";
            ?>
            <button onclick="edit();return false;">修改</button>
        </form>
    </main>
    <script>
        function edit() {
            $.ajax({
                type: 'post',
                url: './inc/post.inc.php',
                dataType: 'json',
                data: $('#taskForm').serialize(),
                success: function (data) {
                    alert(data.msg);
                    if(data.state) window.location.href = document.URL;
                }
            })
        }
    </script>
 
</body>
</html>