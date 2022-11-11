<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/nodemailer@6.7.8/postinstall.js" type="text/javascript"></script>
    <script src="./email_check.js" type="module"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
</head>

<body>

<header id="header">
      <div class="logo">
        <center>
          <img src="../images/logo5.PNG" width="350" height="120">
        </center>
      </div>
    </header>
    
    <form action="signup.php" method="POST" id="signup-form">
        <div class="w-50 ml-auto mr-auto mt-5">
        <div class="mb-3 ">
                <label for="id" class="form-label">이름</label>
                <input type="id" name="name" class="form-control" id="name" placeholder="아이디를 입력해 주세요.">
            </div>
        <div class="mb-3 ">
                <label for="id" class="form-label">아이디</label>
                <input type="id" name="id" class="form-control" id="id" placeholder="아이디를 입력해 주세요.">
            </div>
            <div class="mb-3 ">
                <label for="password" class="form-label">비밀번호</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="비밀번호를 입력해 주세요.">
            </div>
            <div class="mb-3 ">
                <label for="passwordCheck" class="form-label">비밀번호 체크</label>
                <input type="password" class="form-control" id="password-check" placeholder="비밀번호를 입력해 주세요.">
            </div>

            <div class="mb-3 ">
                <label for="id" class="form-label">이메일 인증</label><br>
                <input type="id" name="email" class="form-control" id="email" placeholder="이메일 인증을 하세요. ex) abc@gmail.com">
            </div>
            <button type="button" id="email-button" class="btn btn-primary mb-3" onclick='checkEmail()'>확인</button>

            <div class="mb-3 ">
                팀 선택<br> 
                웹개발팀<input name="check" type="radio"  value="11">
                같이가치<input name="check" type="radio"  value="12">
                블록체인<input name="check" type="radio"  value="13">
                기초개발<input name="check" type="radio"  value="14">
                기존해킹<input name="check" type="radio"  value="21">
                기초해킹<input name="check" type="radio"  value="22"> 
                
            </div>

            <button type="button" id="signup-button" class="btn btn-primary mb-3">회원가입</button>
        </div>
    </form>
    <script>
        const signupForm = document.querySelector("#signup-form");
        const signupButton = document.querySelector("#signup-button");
        const password = document.querySelector("#password");
        const passwordCheck = document.querySelector("#password-check");
        signupButton.addEventListener("click", function(e) {
            if(password.value&& password.value === passwordCheck.value){
                
            signupForm.submit();
            }else{
                alert("비밀번호가 서로 일치하지 않습니다");
            }
        });
    </script>
</body>

</html>