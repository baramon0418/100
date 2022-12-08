<?php 
    $pid=$_GET['pid'];
    if(isset($_SESSION['uid'])){
        $uid = $_SESSION['uid'];
        $admin = $_SESSION['admin'];
    }
    else{
      $uid=-1;
      $admin=0;
    }

    $list = array('211'=>'기초팀 공지사항', '212'=>'개발팀 공지사항', '213'=>'해킹팀 공지사항','221'=>'기초팀 게시판', '222'=>'개발팀 게시판', '223'=>'해킹팀 게시판');
    
    $boardtype = (int)((int)$pid/100000000000000);
    
    echo $boardtype;

    $subboardtype = $list[$boardtype];


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
    $thomb = $row['thomb'];

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

#info #info-footer {
    border-bottom: 2px solid #5E77F6;
    background: #cdf0ff;
    padding: 0.8em 0.8em;
    width:1440px;
    height:20px;
    padding-left: 20px;
}

.btn-outline-success {
  color: #5cb85c;
  background-image: none;
  background-color: rgba(0,0,0,0);
  border-color: #5cb85c;
}
.vote-area {
  text-align: center;
  padding: 0 0.8em 0.3em;
  border-left: 1px solid #f1f1f1;
  border-right: 1px solid #f1f1f1;
}
.like {
  padding:0.8em;
  border : 3px;
  margin-bottom: 10px;
  color: blue;
  background-image: none;
  background-color: rgba(0,0,0,0);
  border-color: blue;
  display: inline-block;
  padding: 6px 12px;
  margin-bottom: 0;
  font-size: 14px;
  font-weight: 400;
  line-height: 1.42857143;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -ms-touch-action: manipulation;
  touch-action: manipulation;
  cursor: pointer;
  border: 1px solid blue;
  border-radius: 6px;
}

.fa {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
.like:hover{color:blue;}
.hover1:hover{
        box-shadow: 0 80px 0 0  rgba(0,0,0,0.25) inset, 
                    0 -80px 0 0 rgba(0,0,0,0.25) inset;
}

<style type="text/css">
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 0.25rem;
  }
  .card > hr {
    margin-right: 0;
    margin-left: 0;
  }
  .card > .list-group {
    border-top: inherit;
    border-bottom: inherit;
  }
  .card > .list-group:first-child {
    border-top-width: 0;
    border-top-left-radius: calc(0.25rem - 1px);
    border-top-right-radius: calc(0.25rem - 1px);
  }
  .card > .list-group:last-child {
    border-bottom-width: 0;
    border-bottom-right-radius: calc(0.25rem - 1px);
    border-bottom-left-radius: calc(0.25rem - 1px);
  }
  .card > .card-header + .list-group,
  .card > .list-group + .card-footer {
    border-top: 0;
  }
  
  .card-body {
    flex: 1 1 auto;
    padding: 1rem 1rem;
  }
  
  .card-title {
    margin-bottom: 0.5rem;
  }

  .card-header {
  padding: 0.5rem 1rem;
  margin-bottom: 0;
  background-color: rgba(0, 0, 0, 0.03);
  border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}
.card-header:first-child {
  border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
}

.card-footer {
  padding: 0.5rem 1rem;
  background-color: rgba(0, 0, 0, 0.03);
  border-top: 1px solid rgba(0, 0, 0, 0.125);
}
.card-footer:last-child {
  border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);
}

.card-header-tabs {
  margin-right: -0.5rem;
  margin-bottom: -0.5rem;
  margin-left: -0.5rem;
  border-bottom: 0;
}

.card-header-pills {
  margin-right: -0.5rem;
  margin-left: -0.5rem;
}

.card-img-overlay {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  border-radius: calc(0.25rem - 1px);
}

.card-img,
.card-img-top,
.card-img-bottom {
  width: 100%;
}

.card-img,
.card-img-top {
  border-top-left-radius: calc(0.25rem - 1px);
  border-top-right-radius: calc(0.25rem - 1px);
}

.card-img,
.card-img-bottom {
  border-bottom-right-radius: calc(0.25rem - 1px);
  border-bottom-left-radius: calc(0.25rem - 1px);
}

.card-group > .card {
  margin-bottom: 0.75rem;
}
@media (min-width: 576px) {
  .card-group {
    display: flex;
    flex-flow: row wrap;
  }
  .card-group > .card {
    flex: 1 0 0%;
    margin-bottom: 0;
  }
  .card-group > .card + .card {
    margin-left: 0;
    border-left: 0;
  }
  .card-group > .card:not(:last-child) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
  }
  .card-group > .card:not(:last-child) .card-img-top,
.card-group > .card:not(:last-child) .card-header {
    border-top-right-radius: 0;
  }
  .card-group > .card:not(:last-child) .card-img-bottom,
.card-group > .card:not(:last-child) .card-footer {
    border-bottom-right-radius: 0;
  }
  .card-group > .card:not(:first-child) {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }
  .card-group > .card:not(:first-child) .card-img-top,
.card-group > .card:not(:first-child) .card-header {
    border-top-left-radius: 0;
  }
  .card-group > .card:not(:first-child) .card-img-bottom,
.card-group > .card:not(:first-child) .card-footer {
    border-bottom-left-radius: 0;
  }
}


  .mb-4 {
  margin-bottom: 1.5rem !important;
}

.d-flex {
  display: flex !important;
}

.flex-shrink-0 {
  flex-shrink: 0 !important;
}

.ms-3 {
  margin-left: 1rem !important;
}

.fw-bold {
  font-weight: 700 !important;
  text-align:left;
}

.form-control {
  display: block;
  width: 100%;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #212529;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.rounded-circle {
  border-radius: 50% !important;
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
          <li><a href="./team/index.php?board=221&&page=1">기초팀</a></li>
          <li><a href="./team/index.php?board=222&&page=1">개발팀</a></li>
          <li><a href="./team/index.php?board=223&&page=1">해킹팀</a></li>
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
        <span id="category"><?php echo $subboardtype ?>| </span>
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
        <div class ="vote-area"></div>
        <form method="post">
            <button name="thomb" id="thomb" class="like"><i class ="fa">👍 <?php echo $thomb;?> 좋아요</i></button>

        </form><!-- alert('좋아요를 눌렀습니다');location.reload();-->

        <?php
            if(array_key_exists('thomb',$_POST)){
                $sql_3 = "UPDATE post set thomb=$thomb + 1 where pid = '$pid'";
                $result_3 = mysqli_query($connect,$sql_3);
                echo "<script>alert('좋아요를 눌렀습니다');</script>";
            }

            ?>
      <br>
          <div id="btn">
          <?php
          if($admin == 1 or $uid == $row['uid']){// or $uid == $row['uid']
          ?>
            <form action='<?php echo "./post_form.php?board=$boardtype&&pid=$pid"?>' method="post">
              <button class="btn">글 수정</button>
            </form>
            <form action='<?php echo "./delete.php?pid=$pid"?>' method="post">
              <button class="btn">글 삭제</button>
            </form>
          <?php
          }
          ?>
            <button class="btn" type="button" onclick="history.back();">목록으로</button>
          
          
          </div>
           
    </div>
    <br>
    <br>


      <!--댓글-->
      <section class="mb-5">
    <div class="card bg-light">
        <div class="card-body">
            <form action='<?php echo "./post_reply.php?pid=$pid"; ?>' method="post">
                <!-- Comment form-->
                <textarea class="form-control" name="reply_content" placeholder="Join the discussion and leave a comment!"></textarea>
                <!-- Comment with nested comments-->
                <!--등록 버튼-->
                <button class="u_cbox_btn_upload">
                  등록
                </button>
            </form>
            <?php
            $sql_4="SELECT * FROM reply WHERE ppid = '$pid' ORDER BY time desc";
            $result_4 = mysqli_query($connect,$sql_4);
            while($row_4=mysqli_fetch_array($result_4)){
            ?>
            <div class="d-flex mb-4">
                <!-- Parent comment-->
                <div class="flex-shrink-0"><img class="rounded-circle" src="https://cdn.discordapp.com/attachments/979721365278056498/1042813115361919017/5cc8d8bb47421dc9.png" alt="..." /></div>
        <div class="ms-3">
                    <div class="fw-bold"><?php
                    $inp = $row_4['uid'];
                    $sql_5="select name from userdata where uid='$inp'";
                    $result_5 = mysqli_query($connect,$sql_5);
                    $row_5 = mysqli_fetch_array($result_5);
                    echo $row_5['name'];
                    ?></div>
                    <?php
                    echo $row_4['replycontents'];?>
                    <!-- Child comment 1-->
                </div>
            </div>
            <?php
            }
            ?>
        </section>




    <footer id="footer">
      <hr style="height: 0.2px; background-color: rgb(157, 155, 155);">
      <p>상명대학교 중앙동아리 CodeCure</p>
      <p style="font-size: 40px; margin-top: 50px; color: rgb(116, 118, 119);">Tel. 010-3811-6232</p>
      <p style="color: rgb(116, 118, 119);">충청남도 천안시 동남구 상명대길 31, 상명대학교 천안캠퍼스 
         <br>회장: 이찬희 | 팀장: 000 | 문의: CodeCoure404 @ gmail.com</p></br>
    </footer>

</body>
</html>
poster.php
12KB