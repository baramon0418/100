<?php

    $servername = "localhost";

    $user = "root";

    $password = "abc123456.";

    $database = 'code-cure';



   $connect = mysqli_connect($servername, $user, $password, $database);

    if (!$connect) {

      die("서버와의 연결 실패! : ".mysqli_connect_error());

    }

    echo "서버와의 연결 성공!";

?>