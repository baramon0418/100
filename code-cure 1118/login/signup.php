<?php
    $id = $_POST["id"];
    $ps = $_POST["password"];
    $team = $_POST["check"];
    //$chps = $_POST["password_check"];
    $email = $_POST["email"];
    $name = $_POST["name"];
    $main_team = (int)((int)$team/10);
    $sub_team = (int)$team - ($main_team*10);
    $uid = "1" . $team . microtime(true)*10000;
    /*echo $uid."\n";
    echo $id."\n";
    echo $ps."\n";
    echo $email."\n";
    echo $main_team."\n";
    echo $sub_team."\n";*/

    
    $servername = "localhost";

    $user = "root";

    $password = "congratulations!!uracodinggenius@@*";

    $database = "code-cure";

    $connect = mysqli_connect($servername, $user, $password,$database);
    if (!$connect) {
        echo "<script>alert('오류 발생\n뒤로 돌아가주세요');</script>";

    }
    $sql = "SELECT * FROM userdata where id='$id'";
    $result = mysqli_query($connect,$sql);
    if(mysqli_num_rows($result)==0){
        $sql = "
    INSERT INTO userdata(uid,id,pass,email,name,team,subteam) values('$uid','$id','$ps','$email','$name',$main_team,$sub_team)";
        $result = mysqli_query($connect,$sql);
        echo "<script>alert('회원가입이 완료되었습니다');location.href='./login_form.php'</script>";
        
    }else{
        echo "<script>alert('중복된 아이디가 있습니다');history.back();</script>";
    }
    //echo "서버와의 연결 성공!";
?>
