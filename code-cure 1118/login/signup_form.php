<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>@import url("http://fonts.googleapis.com/earlyaccess/nanumgothic.css");
	.background{
    background:linear-gradient(to bottom right, #010e7e, #6BA8D1);
  }
	html {
		/*height: 100%;*/
    min-height: 100%;
	}
	
	body {
	    /*width:100%;*/
	    /*height:100%;*/
      min-height: 100%;
	    margin: 0;
  		padding-top: 80px;
  		padding-bottom: 40px;
  		font-family: "Nanum Gothic", arial, helvetica, sans-serif;
  		/*background-repeat: no-repeat;*/
  		/*background:linear-gradient(to bottom right, #010e7e, #6BA8D1);*/
	}
	
    .card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
	
	.form-signin .form-control {
  		position: relative;
  		height: auto;
  		-webkit-box-sizing: border-box;
     	-moz-box-sizing: border-box;
        	 box-sizing: border-box;
  		padding: 10px;
  		font-size: 16px;
	}
    .check_same{
        border:none;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        border-top-right-radius:5px;
        border-bottom-right-radius: 5px;
        margin-top:5px;
        color:white;
        background:#007bff;
    }
    .check_same:hover{
        background:#0069d9;
    }
</style>
  </head>

  <!--<body cellpadding="0" cellspacing="0" marginleft="0" margintop="0" width="100%" height="50%" align="center">-->
  <body class="background">

	<div class="card align-middle" style="width: 600px; border-radius:20px;">
		<div class="card-title" style="margin-top:30px;">
            <div class="logo">
                <center>
                  <img src="../images/logo5.PNG" width="220" height="100">
                </center>
		</div>
		<div class="card-body">
      <form action="./signup.php" method="POST" id="login-form">
        <!--<h5 class="form-signin-heading">정보를 입력해주세요</h5>-->
        <label for="id" class="label-class">이름</label>
        <input type="id" name="name" class="form-control" id="name" placeholder="이름을 입력해주세요" required autofocus><br>
        <label for="id" class="form-label">아이디</label>
        <input type="id" name="id" class="form-control" id="id" placeholder="아이디를 입력해 주세요.">

        <!--<button type="button"class="btn btn-primary mb-3" style="margin-top:5px;" onclick="var result =''
">중복검사</button><br>-->

        <label for="password" class="form-label">비밀번호</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="비밀번호를 입력해 주세요."><br>

        <label for="passwordCheck" class="form-label">비밀번호 체크</label>
        <input type="password" class="form-control" id="password-check" placeholder="비밀번호를 입력해 주세요."><br>



        <label for="id" class="form-label">이메일 인증</label><br>
        <input type="id" name="email" class="form-control" id="email" placeholder="이메일 인증을 하세요. ex) abc@gmail.com">

            <!--<button type="button" id="email-button" class="btn btn-primary mb-3" style="margin-top:5px;" onclick='checkEmail()'>확인</button>-->

            <div class="mb-3 ">
                팀 선택<br> 
                <a>웹개발팀</a><input name="check" type="radio"  value="11">
                <a>같이가치</a><input name="check" type="radio"  value="12">
                <a>블록체인</a><input name="check" type="radio"  value="13">
                <a>기초개발</a><input name="check" type="radio"  value="14">
                <a>기존해킹</a><input name="check" type="radio"  value="21">
                <a>기초해킹</a><input name="check" type="radio"  value="22"> 
                
            </div>
            <div class="checkbox">
        </div>
        <button id="btn-Yes" class="btn btn-lg btn-primary btn-block" type="submit">회 원 가 입</button>
      </form>

      <script>
        const signupForm = document.querySelector("#signup-form");
        const signupButton = document.querySelector("#signup-button");
        const password = document.querySelector("#password");
        const passwordCheck = document.querySelector("#password-check");

        const password = document.querySelector("#id");

        signupButton.addEventListener("click", function(e) {
            if(password.value&& password.value === passwordCheck.value){
                
            signupForm.submit();
            }else{
                alert("비밀번호가 서로 일치하지 않습니다");
            }
        });
    </script>
      
		</div>
	</div>

	<div class="modal">
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
  </body>
</html>