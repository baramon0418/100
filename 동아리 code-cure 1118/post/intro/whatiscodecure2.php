<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeCure</title>
    <script type="text/javascript">
        window.onload = function(){
            document.body.style.zoom = "90%";
        }
      /*$(document).ready(function(){
          document.body.style.zoom = "90%";
      })*/

    </script>
    <script type="text/javascript" src="script2.js"></script>
  <link rel="stylesheet" href="../css/index.css">
  <style type="text/css">
   
        #container {
            width: 1500px;
            padding: 20px;
            margin:0 auto;
            text-align: center;
        }
        #header{
            display: flex;          
            padding: 20px;
            margin-bottom: 40px;
           
        }
        nav{
            clear: both;
            text-align: center;
            margin-left: 10px;
        }
        nav ul li{
           
            display: inline-block;
            font-size: 25px;
            margin: 30px;
            margin-top: 10px;
            
        }
        #form{
            
            margin: auto;
        }
        .logo{
            margin: auto;
        }
        #login{
            
            margin: auto;
            font-size: 50px;
           
        }
        #content{
            display: block;
            width: 1450px;
            padding: 20px;
            
            margin-bottom: 20px;
        }
        #view{
            margin-left: 40px;
            
            width: 1300px;
            height: 500px;
        }
        .row1{
            text-align: left;
            margin: auto;
            margin-top: 50px;
            width: 1400px;
            
        }
        .row1-1{
            float: left;
            width: 440px;
            padding: 5px;
        }
        .row1-2{
            float: left;
            width: 440px;
            padding: 5px;
        }
        .row1-3{
            text-align: center;
            float: left;
            width: 440px;
            padding: 5px;
        }
        .row2{
            padding-top: 100px;
            width: 1300px;
            clear: both;
            margin:auto;
           
        }
        .row2-1{
            float: left;
            width: 600px;
            padding: 10px;
        }
        .row2-2{
            float: left;
            width: 600px;
            padding: 10px;
        }
        #footer{
            margin-top: 500px;
            clear: both;
            padding: 20px;
        }
        footer p{
          
            font-size: 25px;
            margin: 30px;
        }

li{list-style:none}
a{text-decoration:none;font-size:25px;}

.menu {
  background-color:rgb(255,0,0) ;
    list-style-type:none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    position:absoulute;
    z-index:2;
}

.menu > li {
  width: 14.285%; 
  float: left;
  text-align: center;
  line-height: 35px;
  background-color: #5778ff;
  
}

.menu a {
  color: #fff;
}

.submenu > li {
  width: 214.5px;
  line-height: 50px;
  background-color: #94a9ff;
}

.submenu {
  height: 0;
  overflow: hidden;
  position:absolute;
  z-index:1;
}

.menu > li:hover {
  background-color: #94a9ff;
  transition-duration: 0.5s;
}

.menu > li:hover .submenu {
  height: 250px;
  transition-duration: 1s;
}

.submenu > li:hover {
  background-color:#5778ff;
  transition-duration: 0.5s;
  
}

      
@font-face {
     font-family: 'DungGeunMo';
     src: url('https://cdn.jsdelivr.net/gh/projectnoonnu/noonfonts_six@1.2/DungGeunMo.woff') format('woff');
     font-weight: normal;
     font-style: normal;
}

body{
    font-family:'DungGeunMo';
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
          <a href="../index.php"><img src="../images/logo5.PNG" width="500" height="200"></a>
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
        
        
        <ul class="menu">
      <li>
        <a href="#">동아리소개</a>
        <ul class="submenu">
          <li><a href="#">코드큐어란?</a></li>
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
        <a href="#" style="color: red;" onclick="alert('지금은 지원 기간이 아닙니다');return 0;">지원</a>
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
<!--사진첨부-->
    <img src ="팀소개.png">
      
        <footer id="footer">
            <hr style="height: 3px; background-color: rgb(157, 155, 155);">
            <p>상명대학교 중앙동아리 CodeCure</p>
            <p style="font-size: 40px; margin-top: 50px; color: rgb(116, 118, 119);">Tel. 010-3811-6232</p>
            <p style="color: rgb(116, 118, 119);">충청남도 천안시 동남구 상명대길 31, 상명대학교 천안캠퍼스 | 회장:김진하 | 팀장: ~~~~ | 문의: CodeCoure404@gmail.com</p>
        </footer>

    </div>

</body>
</html>