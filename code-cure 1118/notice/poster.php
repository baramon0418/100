<?php 
    $pid=$_GET['pid'];
    if(isset($_SESSION['uid'])){
        $uid = $_SESSION['uid'];
        $admin = $_SESSION['admin'];
    }
    $servername = "localhost";

    $user = "root";

    $password = "congratulations!!uracodinggenius@@*";

    $database = "code-cure";

    $connect = mysqli_connect($servername, $user, $password,$database);
    if (!$connect) {
        echo "<script>alert('오류 발생\n뒤로 돌아가주세요');</script>";

    }
    $sql="SELECT * FROM post WHERE pid = '$pid'";
    $result = mysqli_query($connect,$sql);
    $row=mysqli_fetch_array($result);
    
    $view = $row['view'];
    $sql_2 = "UPDATE post set view=$view + 1 where pid = '$pid'";
    $result_2 = mysqli_query($connect,$sql_2);
    
?>

<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CodeCure</title>
  
<!--플랫폼이 PC여부-->
  <script type="text/javascript" src="script2.js"></script>
  <link rel="stylesheet" href="../css/index.css">
  <style type="text/css">
	body{
		line-height:2em;	
	}
	ul, li{ 
	    list-style:none;
	    text-align:center;
	    padding:0;
	    margin:0;
    }

    #mainWrapper{
    	width: 1450px;
		  margin: 20; /* 가운데정렬 0 auto*/
	}

	#mainWrapper > ul > li:first-child {
		text-align: left;
		font-size:25pt;
		height:40px;
		vertical-align:middle;
		line-height:30px;
	}

	#ulTable {margin-top:10px;}
	

	#ulTable > li:first-child > ul > li {
		background-color:#c9c9c9;
		font-weight:bold;
		text-align:center;
	}

    #ulTable > li > ul {
    	clear:both;
    	padding:0px auto;
    	position:relative;
    	min-width:40px;
    }
    #ulTable > li > ul > li { 
    	float:left;
    	font-size:10pt;
    	border-bottom:1px solid silver;
    	vertical-align:baseline;
    }    

    #ulTable > li > ul > li:first-child           	{width:12%;} /*No 열 크기*/
    #ulTable > li > ul > li:first-child +li       	{width:50%;} /*제목 열 크기*/
    #ulTable > li > ul > li:first-child +li+li    	{width:18%;} /*작성일 열 크기*/
    #ulTable > li > ul > li:first-child +li+li+li 	{width:10%;} /*작성자 열 크기*/
    #ulTable > li > ul > li:first-child +li+li+li+li{width:10%;} /*조회수 열 크기*/

    #divPaging {
  		clear:both; 
    	margin:0 auto; 
    	width:220px; 
    	height:50px;
    }

    #divPaging > div {
	    float:left;
	    width: 30px;
	    margin:0 auto;
	    text-align:center;
     }

    #liSearchOption {clear:both;}
    #liSearchOption > div {
	    margin:0 auto; 
	    margin-top: 30px; 
	    width:auto; 
	    height:100px; 
	   
    }

    .left {
    	text-align : left;
        font-size:25px;
    }

    #wrap {
        width: 1450px;
	    margin:auto;
    }
    table{
        width: 100%;
        border-collapse: collapse;
        line-height: 24px;
    }
    table td,th {
        border-top:1px solid black;
        border-bottom:1px solid black;
        border-collapse: collapse;
        text-align: center;
        padding: 10px;
    }
    th {
	    background: rgb(221, 221, 221);
    }
    a{
        text-decoration: none;
        color: black;
    }
    a:hover{
        text-decoration: underline;
    }
    .btn {
        float:right;
        margin: 3px;
    }
    #content {
        width:50%;
        height:50%;
    }
    .btn1 {
        float:center;
    }
    #info>h2 {
    font-size: 20px;
    width: 1450px;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    text-align: left;
    padding-left: 22px;
    font-size:25px;
    font-weight:normal;
    padding-bottom:10px;
}

#info #info-writer {
    font-size: 15px;
    text-align:left;
}

#info #writer-id {
    font-size:20px;
    padding-left: 20px;

}
#info #info-header {
    border-top: 2px solid #5E77F6;
    background: #cdf0ff;
    padding: 0.8em 0.8em;
    width:1450px;
    height:20px;
    padding-left: 20px;
}
#info #info-time {
    font-size: 20px;
    text-align:right;
    width:30%;
}
#content {
    border:2px solid #5E77F6;
    width:1430px;
    height:500px;
    padding-left: 20px;
    
}
#info #info-view {
    text-align:right;
    width:70%;
    height:50px;
    float:right;
}

</style>
</head>

<body>
  <!--<span id="viewers-area" class>
        <span id="viewers">
            ::before
            "1"
            ::after
        </span>
    
    </span>-->

  <div id="container">
    <header id="header">
      <div id="form">
        <form>
          <input style="width: 145px;height: 30px;border: 2px solid #94a9ff;border-top-left-radius: 15px;border-bottom-left-radius: 15px;border-right:none;font-size:20px;
" type="text" title="Search">
          <input type="button" value="검색"
            style="width:55px;height: 34px;border: 2px solid #94a9ff;border-top-right-radius: 15px;border-bottom-right-radius: 15px;border-left:none;float: right; font-family: 'DungGeunMo';background:none;">
        </form>
      </div>
      <div class="logo">
        <center>
          <img src="../images/logo5.PNG" width="500" height="200">
        </center>
      </div>
      <?php
      if(isset($_SESSION['name'])){
      ?>  <div id="login" style="font-size: 0px;">
          <a href="#"><?php echo $_SESSION['name'];?></a>
          <a style="font-size: 40px;">|</a>
          <a href="../logout.php">로그아웃</a>
      </div>
          <!--<div id="usermenu">
            <li><a text-decoration-line : none><?php //echo $_SESSION['name'];?></a></li>
              <ul>
                  <li><a href="#">마이페이지</a></li>
                  <li><a href="./logout.php">로그아웃</a></li>
              </ul>
          </div>-->
      <?php
      }else{?>

      <div id="login" style="font-size: 0px;">
        <a href="../login/login_form.php">로그인</a>
        <a style="font-size: 40px;">|</a>
        <a href="../login/signup_form.php">회원가입</a>
      </div>
      <?php
      }?>
    </header>


    <ul style="width: 1450px; margin-left: 20px;" class="menu"> <!-- 네비게이션 바 설정-->
      <li>
      <a href="./intro/whatiscodecure1.php">동아리소개</a>
        <ul class="submenu">
        <li><a href="./intro/whatiscodecure1.php">코드큐어란?</a></li>
          <li><a href="./intro/whatiscodecure2.php">동아리 소개</a></li>
          <li><a href="./intro/whatiscodecure3.php">임원진 소개</a></li>
        </ul>
      </li>
      <li>
        <a href="#">공지사항</a>
        <ul class="submenu">
        <li><a href="./index.php?board=211&&page=1">기초팀</a></li>
        <li><a href="./index.php?board=212&&page=1">개발팀</a></li>
        <li><a href="./index.php?board=213&&page=1">해킹팀</a></li>
        </ul>
      </li>
      <li>
        <a href="#">팀별 게시판</a>
        <ul class="submenu">
        <li><a href="./index.php?board=211&&page=1">기초팀</a></li>
        <li><a href="./index.php?board=212&&page=1">개발팀</a></li>
        <li><a href="./index.php?board=213&&page=1">해킹팀</a></li>
        </ul>
      </li>
      <li>
        <a href="#">자유 게시판</a>
        <ul class="submenu">
          <li><a href="#">자유게시판</a></li>
          <li><a href="#">익명게시판</a></li>
          <li><a href="#">불건너강구경</a></li>
        </ul>
      </li>
      <li>
        <a href="#">갤러리</a>
        <ul class="submenu">
          <li><a href="#">활동</a></li>
          <li><a href="#">VLOG</a></li>
          <li><a href="#">일상</a></li>
        </ul>
      </li>
      <li>
        <a href="#">문의 사항</a>
        <ul class="submenu">
          <li><a href="#">문의사항</a></li>
          <li><a href="#">많이 하는 질문</a></li>
          <li><a href="#">Q&A</a></li>
          <li><a href="#">버그제보</a></li>
        </ul>
      </li>
      <li>
        <a href="#" style="color: yellow;" onclick="alert('지금은 지원 기간이 아닙니다');return 0;">지원</a>
        <ul class="submenu">
          <!--<li><a href="#">submenu01</a></li>
          <li><a href="#">submenu02</a></li>
          <li><a href="#">submenu03</a></li>
          <li><a href="#">submenu04</a></li>
          <li><a href="#">submenu05</a></li>-->
        </ul>
      </li>
    </ul>
<br>
    <div id="info">
        <h2>
        <span id="category">기초팀 공지사항| </span>
        <span id="title"><?php echo $row['title']?></span>
        </h2>
        <!--<hr style ="width: 1300px; border-top: 3px dashed #5E77F6; padding-left:200px">-->
        <div id="info-header"><div id="info-writer"><strong id="writer-id"><?php
                        $wr = $row['writer'];
                        $sql = "select name from userdata where uid='$wr'";
                        $result_1 = mysqli_query($connect,$sql);
                        $row_1 = mysqli_fetch_array($result_1);
                        echo $row_1['name'];
                        ?></strong>
            <span id="info-time">| <?php
                            $now = DateTime::createFromFormat('U.u', $row['time']);
                            echo $now->format("Y-m-d");
                            //date_create_from_format("Y-m-d",)
                            ?></span><span id="info-view">조회수|<?php echo $row['view']?></span></div></div>
        <div id="content"style="text-align:left;"><?php echo $row['description']?>
        </div>
        <br>
            
            <br>
            <input class="btn1" type="button" value="좋아요">
            <div id="btn">
            <input class="btn" type="reset" value="글 수정">
            <input class="btn" type="button" value="글 삭제">
            <input class="btn" type="button" value="목록으로" onclick="location.href='BoardServlet?command=board_list'"></div>
           
            <div class="mb-3">

<label for="title">댓글</label>

<input type="text"class="form-control"  style ="width=1450px, height=500px" name="title" id="title" placeholder="내용을 입력해 주세요">

</div>
    </div>


      <!--댓글-->






    <footer id="footer">
      <hr style="height: 0.2px; background-color: rgb(157, 155, 155);">
      <p>상명대학교 중앙동아리 CodeCure</p>
      <p style="font-size: 40px; margin-top: 50px; color: rgb(116, 118, 119);">Tel. 010-3811-6232</p>
      <p style="color: rgb(116, 118, 119);">충청남도 천안시 동남구 상명대길 31, 상명대학교 천안캠퍼스 
         <br>회장: 이찬희 | 팀장: 000 | 문의: CodeCoure404 @ gmail.com</p></br>
    </footer>

</body>
</html>
