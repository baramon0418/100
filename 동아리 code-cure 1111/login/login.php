<script>console.log("테스트x");
</script><?php
    $id = $_POST["id"];
    $ps = $_POST["password"];
    
    $servername = "localhost";

    $user = "root";

    $password = "congratulations!!uracodinggenius@@*";

    $database = "code-cure";

    $connect = mysqli_connect($servername, $user, $password,$database);
    if (!$connect) {
        echo "<script>alert('오류 발생\n뒤로 돌아가주세요');</script>";

    }
    $sql = "SELECT * from userdata where id='$id' and pass='$ps'";
    $result = mysqli_query($connect,$sql);
    //echo mysqli_num_rows($result);
    if(mysqli_num_rows($result) == 1){
        session_start();
        $row = mysqli_fetch_array($result);
        $_SESSION['uid'] = $row['uid'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['admin'] = $row['admin'];
        ?><script>location.href = '../index.php';</script>";
        <?php
    }
    else{
        ?>
        <script>
        alert('아이디 또는 비밀번호가 틀렸습니다');
        history.back();
        </script>
    <?php
        /*$prevPage = $_SERVER['HTTP_REFERER'];

        header('location:'.$prevPage);*/

    }
    //$result = $connect->query($sql);
    //$cnt = $result->num_rows;
    //echo $cnt;
    /*if($result->num_rows == 1){
        echo "test";
    }*/
?>
