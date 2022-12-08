<?php
    $pid= $_GET['pid'];

    $board = (int)((int)$pid/100000000000000);

    $servername = "localhost";

    $user = "root";

    $password = "congratulations!!uracodinggenius@@*";

    $database = "code-cure";

    $connect = mysqli_connect($servername, $user, $password,$database);
    if (!$connect) {
        echo "<script>alert('오류 발생\n뒤로 돌아가주세요');</script>";

    }
    $sql = "DELETE from post where pid='$pid'";
    mysqli_query($connect,$sql);
    
?>
<script>
    alert('해당 개시물이 삭제되었습니다');
    board = '<?php echo $board ?>';
    check = board.slice(1,2);
    console.log(check);
    if(check == '1'){ 
        location.href=`./notice/index.php?board=${board}&&page=1`;
    }
    else if(check == '2'){
        location.href=`./team/index.php?board=${board}&&page=1`;
    }
</script>