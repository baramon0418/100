<?php
    $boardtype=$_GET['board'];

	$pid=$_GET['pid'];

	$servername = "localhost";

    $user = "root";

    $password = "congratulations!!uracodinggenius@@*";

    $database = "code-cure";

    $connect = mysqli_connect($servername, $user, $password,$database);
    if (!$connect) {
        echo "<script>alert('오류 발생\n뒤로 돌아가주세요');</script>";

    }
	if(empty($pid)){
		$check==0;
	}
	else{
		$sql="SELECT * FROM post WHERE pid = '$pid'";
		$result = mysqli_query($connect,$sql);
		$row=mysqli_fetch_array($result);
		$check=mysqli_num_rows($result)==1;
	
	}
?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">



<!-- jQuery -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



<!-- Bootstrap CSS -->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">



<title>글쓰기</title>



<script>

	/*$(document).on('click', '#btnSave', function(e){

		e.preventDefault();

		

		$("#form").submit();

	});*/

	

	$(document).on('click', '#btnList', function(e){

		e.preventDefault();

		

		location.href=history.back();//"${pageContext.request.contextPath}/board/getBoardList";

	});

</script>

<style>

body {

  padding-top: 70px;

  padding-bottom: 30px;

}



</style>

</head>

<body>

	<article>

		<div class="container" role="main">

			<h2>게시판</h2>

            
			<form name="form" id="form" role="form" method="post" action='<?php echo "./post.php?board=$boardtype&&pid=$pid"
			?>
			'>
            
				<div class="mb-3">

					<label for="title">제목</label>

					<input type="text" class="form-control" name="title" id="title" value="<?php
					if($check==1){
						echo $row['title'];
					}
					
					?>"placeholder="제목을 입력해 주세요" >

				</div>

				

				<div class="mb-3">

					<label for="content">내용</label>

					<textarea class="form-control" rows="5" name="content" id="content" placeholder="내용을 입력해 주세요" ><?php
					if($check==1){
						echo $row['description'];
					}
					?></textarea>

				</div>

				<div class="mb-3 "> 
                <a>비밀글</a><input name="secret" type="radio"  value="1">
				</div>


				<div >

					<button class="btn btn-sm btn-primary" id="btnSave">저장</button>

					<button type="button" class="btn btn-sm btn-primary" id="btnList" onclick="history.back();">목록</button>

				</div>
			</form>

		</div>

	</article>

</body>

</html>