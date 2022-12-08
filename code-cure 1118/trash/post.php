<?php
    $title = $_POST['title'];
    $writer = $_SESSION['uid'];
    $content = $_POST['content'];
    $time=microtime(true);//1668070720.2494
    echo "<script>console.log('$time')</script>";
    $link_board=$_GET['board'];
    $boardtype=(int)$_GET['board'] - 200;//11
    $board=(int)($boardtype / 10);
    $subboard=$boardtype - ($board * 10);
    $view = 0;
    $thomb = 0;
    if($_POST['secret'] == "1"){
        $secret=0;
    }else{
        $secret=1;
    }
    $pid="2".$boardtype.($time*10000);

    if(empty($title)){
        echo "<script>alert('제목을 적어주세요');history.back();</script>";
    }
    else if(empty($content)){
        echo "<script>alert('내용을 적어주세요');history.back();</script>";
    }
    else{
        $servername = "localhost";

        $user = "root";

        $password = "congratulations!!uracodinggenius@@*";

        $database = "code-cure";

        $connect = mysqli_connect($servername, $user, $password,$database);
        if (!$connect) {
            echo "<script>alert('오류 발생\n뒤로 돌아가주세요');</script>";

        }


        $sql = "INSERT INTO post VALUES(
            '$pid', $board, $subboard, '$title', '$content', '$writer', $time, $secret, $view, $thomb
        )";
        $result = mysqli_query($connect,$sql);
        echo "<script>location.href=`./index.php?board=$link_board&&page=1`</script>";
        }

        

?>