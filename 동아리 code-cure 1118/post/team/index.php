<?php
    $page = (int)$_GET['page'];
    $list = array('221'=>'기초팀 게시판', '222'=>'개발팀 게시판', '223'=>'해킹팀 게시판');
    $teamlist = array('221' => '0', '222' => '11', '223' => '12');
    $boardtype = $_GET['board'];
    $subboardtype = $list[$boardtype];
    if(isset($_SESSION['uid'])){
        $uid = $_SESSION['uid'];
        $admin = $_SESSION['admin'];
    }
    else{
      $uid=0;
      $admin=0;
    }

    if((int)$teamlist[$boardtype] != (double)((int)$uid/1000000000000000)){
      ?>
      <script>
        alert('해당 팀이 아닙니다');
        history.back();
        </script>
      <?php
    }
    
    if($page == '1'){
        $start=(int)$page-1;
    }else{
        $start = (((int)$page-1)*20)+1;
    }

    $finish = ((int)$page*20);

    $board = (int)(((int)$boardtype - 200)/10);
    
    $subboard = ((int)$boardtype - 200) - ($board*10);

    $servername = "localhost";

    $user = "root";

    $password = "congratulations!!uracodinggenius@@*";

    $database = "code-cure";

    $connect = mysqli_connect($servername, $user, $password,$database);

    $result=mysqli_query($connect,"SELECT * FROM post WHERE board=$board and subboard=$subboard");
    $total = ceil(mysqli_num_rows($result)/20);

    echo $boardtype."<br>".$teamlist;

?>

<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CodeCure</title>
  
<!--플랫폼이 PC여부-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>@import url("http://fonts.googleapis.com/earlyaccess/nanumgothic.css");</style>
  <script type="text/javascript" src="script2.js"></script>
  <link rel="stylesheet" href="../../css/index.css">
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

    }
    .left>a{
      color:black;
      font-size: 15px;
    }
    .left>a:link {
      color : black;
    }
    .left>a:visited {
      color : black;
    }
    .left>a:hover {
      color : black;
    }
    .left>a:active {
      color : black
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
        <a href="../index.php"><img src="../../images/logo5.PNG" width="500" height="200"></a>
        </center>
      </div>
      <?php
      if(isset($_SESSION['name'])){
      ?>  <div id="login" style="font-size: 0px;">
          <a href="#"><?php echo $_SESSION['name'];?></a>
          <a style="font-size: 40px;">|</a>
          <a href="../../logout.php">로그아웃</a>
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
        <a href="../../login/login_form.php">로그인</a>
        <a style="font-size: 40px;">|</a>
        <a href="../../login/signup_form.php">회원가입</a>
      </div>
      <?php
      }?>
    </header>


    <ul style="width: 1450px; margin-left: 20px;" class="menu"> <!-- 네비게이션 바 설정-->
      <li>
        <a href="./intro/whatiscodecure.html">동아리소개</a>
        <ul class="submenu">
          <li><a href="./intro/whatiscodecure.html">코드큐어란?</a></li>
          <li><a href="#">동아리 소개</a></li>
          <li><a href="#">임원진 소개</a></li>
        </ul>
      </li>
      <li>
        <a href="#">공지사항</a>
        <ul class="submenu">
          <li><a href="#">기초팀</a></li>
          <li><a href="#">개발팀</a></li>
          <li><a href="#">해킹팀</a></li>
        </ul>
      </li>
      <li>
        <a href="#">팀별 게시판</a>
        <ul class="submenu">
          <li><a href="#">기초팀</a></li>
          <li><a href="#">개발팀</a></li>
          <li><a href="#">해킹팀</a></li>
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


    <div id="mainWrapper">

		<ul>
			<!-- 게시판 제목 -->
			<li><?php echo $subboardtype; ?></li>

			<!-- 게시판 목록  -->
			<li>
				<ul id ="ulTable">
					<li>
						<ul>
							<li>번호</li>
							<li>제목</li>
							<li>날짜</li>
							<li>작성자</li>
							<li>조회수</li>
						</ul>
					</li>
					<!-- 게시물이 출력될 영역 -->
          <!--테스트다요-->
          <?php
              $sql="SELECT * FROM post WHERE board=$board and subboard=$subboard ORDER BY time desc limit $start,$finish";
              $result = mysqli_query($connect,$sql);
              $cnt = 0;
              while($row=mysqli_fetch_array($result)){
                $cnt = $cnt+1;?>
                <li>
                    <ul>
                        <li><?php echo $cnt;?></li>
                        
                        <li class="left">
                        <?php
                        if($row['secret']){?>
                            <a href="<?php echo '../poster.php?pid='.$row['pid'];?>"><?php echo $row['title'];?></a>
                        <?php
                        }
                        else{
                            if($_SESSION['admin'])
                        ?>
                            <a href="#" onclick="alert('이 게시물은 비밀 게시물 입니다');">🔑<?php echo $row['title'];?></a>
                        <?php
                            
                        }?>
                        <li><?php
                            $now = DateTime::createFromFormat('U.u', $row['time']);
                            echo $now->format("Y-m-d");
                            //date_create_from_format("Y-m-d",)
                            ?></li>
                        <li><?php
                        $wr = $row['writer'];
                        $sql = "select name from userdata where uid='$wr'";
                        $result_1 = mysqli_query($connect,$sql);
                        $row_1 = mysqli_fetch_array($result_1);
                        echo $row_1['name'];
                        ?></li>
                        <li><?php echo $row['view']; ?></li>
                    </ul>
              </li>
              <?php
              }
          ?>
										
				</ul>
			</li>

			<!-- 게시판 페이징 영역 -->
			<li>
				<div id="divPaging">
          <?php
          if($page==1){?>
              <div onclick="alert('1페이지 입니다');">◀</div>
          <?php
          }
          else{
              $before = $page - 1;
            ?>
              <div onclick='location.href=`<?php echo "./index.php?board=$boardtype&&page=$before"?>`;'>◀</div>
          <?php
          }
          ?>

          <?php
          if($total<=5){
              $page_start = 1;
              $page_finish = $total;
          }
          else if($page<=3){
              $page_start = 1;
              $page_finish = 5;
          }
          else if($page>=$total-2){
              $page_start = $total - 5;
              $page_finish = $total;
          }
          else{
              $page_start = $page - 2;
              $page_finish = $page + 2;
          }
          for($i=$page_start;$i<=$page_finish;$i=$i+1){
              if($i==$page){
                echo "<div><b>$i</b></a></div>";
              }
              else{?>
                  <div onclick='location.href=`<?php echo "./index.php?board=$boardtype&&page=$i";?>`;'><?php echo $i ;?></div>
              <?php
              }
          }
          
          ?>

          <?php
          if($page==$total){?>
              <div onclick="alert('마지막 페이지 입니다');">▶</div>
          <?php
          }
          else{
              $after = $page + 1;
            ?>
              <div onclick='location.href=`<?php echo "./index.php?board=$board_type&&page=$after"?>`;'>▶</div>
          <?php
          }
          ?>
					<!--<div>◀</div>
               		<div><b>1</b></div>
                	<div>2</div>
                	<div>..</div>
                	<div><input id="pagevalue" style="width:30px;font-size:15px;" type="search" onkeypress="
                  if(event.keyCode===13){
                    const page = document.getElementById('pagevalue').value;
                    location.href = `./index.php?page=${page}`;
                  }"></div>
                	<div>▶</div>
				</div>-->
			</li>

			<!-- 검색 폼 영역 -->
			<li id='liSearchOption'>
	            <div>
	                <select id='selSearchOption' >
	                    <option value='A'>제목+내용</option>
	                    <option value='T'>제목</option>
	                    <option value='C'>내용</option>
	                </select>
	                <input id='txtKeyWord' />
	                <input type='button' value='검색'/>
	            </div>
      	  	</li>

		</ul>
	</div>


    <div>
    <br>
    <button style="width: 70pt;" id="write" class="btn btn-lg btn-primary btn-block" type="button" onclick="location.href='<?php echo '../post_form.php?board='.$boardtype?>'">글쓰기</button>


    <footer id="footer">
      <hr style="height: 0.2px; background-color: rgb(157, 155, 155);">
      <p>상명대학교 중앙동아리 CodeCure</p>
      <p style="font-size: 40px; margin-top: 50px; color: rgb(116, 118, 119);">Tel. 010-3811-6232</p>
      <p style="color: rgb(116, 118, 119);">충청남도 천안시 동남구 상명대길 31, 상명대학교 천안캠퍼스 
         <br>회장: 이찬희 | 팀장: 000 | 문의: CodeCoure404 @ gmail.com</p></br>
    </footer>

</body>
</html>