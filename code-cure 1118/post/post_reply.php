<?php
    $uid=$_SESSION['uid'];
    $ppid=$_GET['pid'];
    $time = microtime(true);
    $pid="300".$time*10000;
    $content = $_POST['reply_content'];

    if(empty($content)){
        echo "<script>alert('댓글을 작성해주세여');history.back();</script>";
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
        $sql = "INSERT into reply(pid,uid,time,ppid,replycontents) values ('$pid','$uid',$time,'$ppid','$content')";
        mysqli_query($connect,$sql);
        echo "<script>alert('댓글 작성이 완료되었습니다');history.go(-1);</script>";
    }
?>