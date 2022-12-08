<!DOCTYPE html>
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
  <link rel="stylesheet" href="./css/index.css">
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
        <form action="./post/search.php" method="get">
          <input name="search-input" id="search-input" style="width: 145px;height: 30px;border: 2px solid #94a9ff;border-top-left-radius: 15px;border-bottom-left-radius: 15px;border-right:none;font-size:20px;
" type="text" title="Search">
          <button
            style="width:55px;height: 34px;border: 2px solid #94a9ff;border-top-right-radius: 15px;border-bottom-right-radius: 15px;border-left:none;float: right; font-family: 'DungGeunMo';background:none;">검색</button>
        </form>
      </div>
      <div class="logo">
        <center>
        <a href="./index.php"><img src="./images/logo5.PNG" width="500" height="200"></a>
        </center>
      </div>
      <?php
      if(isset($_SESSION['name'])){
      ?>  <div id="login" style="font-size: 0px;">
          <a href="#"><?php echo $_SESSION['name'];?></a>
          <a style="font-size: 40px;">|</a>
          <a href="./logout.php">로그아웃</a>
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
        <a href="./login/login_form.php">로그인</a>
        <a style="font-size: 40px;">|</a>
        <a href="./login/signup_form.php">회원가입</a>
      </div>
      <?php
      }?>
    </header>


    <ul style="width: 1450px; margin-left: 20px;" class="menu"> <!-- 네비게이션 바 설정-->
      <li>
        <a href="./intro/whatiscodecure.html">동아리소개</a>
        <ul class="submenu">
          <li><a href="./post/intro/whatiscodecure1.php">코드큐어란?</a></li>
          <li><a href="./post/intro/whatiscodecure2.php">동아리 소개</a></li>
          <li><a href="./post/intro/whatiscodecure3.php">임원진 소개</a></li>
        </ul>
      </li>
      <li>
        <a href="#">공지사항</a>
        <ul class="submenu">
          <li><a href="./post/notice/index.php?board=211&&page=1">기초팀</a></li>
          <li><a href="./post/notice/index.php?board=212&&page=1">개발팀</a></li>
          <li><a href="./post/notice/index.php?board=213&&page=1">해킹팀</a></li>
        </ul>
      </li>
      <li>
        <a href="#">팀별 게시판</a>
        <ul class="submenu">
          <li><a href="./post/team/index.php?board=221&&page=1">기초팀</a></li>
          <li><a href="./post/team/index.php?board=222&&page=1">개발팀</a></li>
          <li><a href="./post/team/index.php?board=223&&page=1">해킹팀</a></li>
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


    <article id="content">

      <div class="section">
        <input type="radio" name="slide" id="slide01" checked>
        <input type="radio" name="slide" id="slide02">
        <input type="radio" name="slide" id="slide03">
        <div class="slidewrap">

          <ul class="slidelist">
            <!-- 슬라이드 영역 -->
            <li class="slideitem">
              <a>
                <div class="textbox">
                </div>
                <img src="./images/해킹팀main.png" height="650">
              </a>
            </li>
            <li class="slideitem">
              <a>

                <div class="textbox">
                </div>
                <img src="./images/개발팀main.png" height="650">
              </a>
            </li>
            <li class="slideitem">
              <a>

                <div class="textbox">
                </div>
                <img src="./images/기초팀main.png" height="650">
              </a>
            </li class="slideitem">

            <!-- 좌,우 슬라이드 버튼 -->
            <div class="slide-control">
              <div>
                <label for="slide03" class="left"></label>
                <label for="slide02" class="right"></label>
              </div>
              <div>
                <label for="slide01" class="left"></label>
                <label for="slide03" class="right"></label>
              </div>
              <div>
                <label for="slide02" class="left"></label>
                <label for="slide01" class="right"></label>
              </div>
            </div>
          </ul>
          <!-- 페이징 -->
          <ul class="slide-pagelist">
            <li><label for="slide01"></label></li>
            <li><label for="slide02"></label></li>
            <li><label for="slide03"></label></li>
          </ul>
        </div>

        <div class="row1">
          <div class="row1-1">
            <div class="su-column-inner su-u-clearfix su-u-trim">
              <h3 class="title" h3 style="font-size:30px;text-align: left;"><span>공지사항</span></h3>
              <br>
              <hr style="height: 3px; background-color: rgb(157, 155, 155);">
              </br>
              <ul class="lcp_catlist" id="lcp_instance_0">
                <li><a href="#" title="첫 게시글 입니다.">· 기초팀 공지사항 !  </a> </li>
                <li><a href="#" title="첫 게시글 입니다.">· 개발팀 공지사항 !</a> </li>
                <li><a href="#" title="첫 게시글 입니다.">· 해킹팀 공지사항 !</a> </li>
                <li><a href="#" title="첫 게시글 입니다.">· 코드큐어 공지사항 ! </a> </li>
                <li><a href="#" title="첫 게시글 입니다.">· 웹 개발팀 활동 소개</a> </li>
                <li><a href="#" title="첫 게시글 입니다.">· 온순이 vs 찡찡이 (중요)  </a> </li>
                <li><a href="#" title="첫 게시글 입니다.">· 찡찡이 vs 마리 (중요)  </a> </li>
                <li><a href="#" title="첫 게시글 입니다.">· 상명대학교 중앙 동아리  </a> </li>
              </ul>
            </div>
          </div>
          <div class="row1-2">
            <div class="su-column-inner su-u-clearfix su-u-trim">
              <h3 class="title" h3 style="font-size:30px; text-align: left;"><span>NEWS</span></h3>
              <br>
              <hr style="height: 3px; background-color: rgb(157, 155, 155);">
              </br>
              <ul class="lcp_catlist" id="lcp_instance_0">
                <li><a href="#" title="첫 게시글 입니다.">· 첫번째 게시글 입니다.</a> </li>
                <li><a href="#" title="첫 게시글 입니다.">· 두번째 게시글 입니다.</a> </li>
                <li><a href="#" title="첫 게시글 입니다.">· 세번째 게시글 입니다.</a> </li>
                <li><a href="#" title="첫 게시글 입니다.">· 네번째 게시글 입니다.</a> </li>
                <li><a href="#" title="첫 게시글 입니다.">· 다섯번째 게시글 입니다.</a> </li>
                <li><a href="#" title="첫 게시글 입니다.">· 여섯번째 게시글 입니다.</a> </li>
                <li><a href="#" title="첫 게시글 입니다.">· 일곱번째 게시글 입니다.</a> </li>
                <li><a href="#" title="첫 게시글 입니다.">· 여덟번째 게시글 입니다.</a> </li>
              </ul>
            </div>
          </div>
          <div class="row1-3">
            <div class="su-column-inner su-u-clearfix su-u-trim">
              <h3 class="title" h3 style="font-size:30px;text-align: left;"><span>포토 갤러리</span></h3>
              <br>
              <hr style="height: 3px; background-color: rgb(157, 155, 155);">
              </br>
              <img style="width: 450px; height: 270px;" src="./images/포토갤러리.png">
            </div>
          </div>
        </div>

        <div class="row2">
          <div class="row2-1">
            <h3 style="font-size: 30px; text-align: left;">CodeCure 소개</h3>
            <br>
            <hr style="height: 3px; background-color: rgb(157, 155, 155);">
            </br>
            <iframe width="500" height="300" src="https://www.youtube.com/embed/MWdqMvLkYT0" frameborder="0"></iframe>
          </div>

          <div class="row2-2">
            <h3 style="font-size:30px; text-align: left;">교내·외 대회 정보</h3>
            <br>
            <hr style="height: 3px; background-color: rgb(157, 155, 155);">
            </br>
            <center>
              <img style="width: 610px; " src="./images/교내대회.png">
            </center>
          </div>
        </div>

    </article>



    <footer id="footer">
      <hr style="height: 0.2px; background-color: rgb(157, 155, 155);">
      <p>상명대학교 중앙동아리 CodeCure</p>
      <p style="font-size: 40px; margin-top: 50px; color: rgb(116, 118, 119);">Tel. 010-3811-6232</p>
      <p style="color: rgb(116, 118, 119);">충청남도 천안시 동남구 상명대길 31, 상명대학교 천안캠퍼스 
         <br>회장: 이찬희 | 팀장: 000 | 문의: CodeCoure404 @ gmail.com</p></br>
    </footer>

  </div>

</body>

</html>