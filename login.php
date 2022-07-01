<?php
session_start();
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/common.css">
<script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/common.js"></script>
<body>
	<div class="container">
	   
	
<!doctype html>
<html lang="en">
<head>
<title>เข้าสู่ระบบ ลงชื่อเข้าใช้งาน</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="asset/img/logoi.ico" />
    <!-- Bootstrap CSS -->
    <!-- Just an image -->
    <style>


.container {
    position: fixed;
  top: 50%;
  left: 50%;
  width : 400px;
  transform: translate(-50%, -50%);

}
.btn-primary{
    border-bottom:3px solid #0853c3;
}
.btn-primary:hover{
    border-bottom:5px solid #0853c3;
}
.btn-danger{
    border-bottom:3px solid #af1a28;
}
.btn-danger:hover{
    border-bottom:5px solid #af1a28;
}
@media (max-width: 979px){
.container {
    position: fixed;
  top: 50%;
  left: 50%;
  width : 90%;
  transform: translate(-50%, -50%);

}
}
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}

</style>
  </head>
  <body>
  <div class="container h-100 d-flex justify-content-center">
  <div class="row box" id="login-box">
	<div class="col">
		<div class="panel panel-login">
		<div class="panel-body">
        <br>
            <img src="asset/img/logo.png" class="img-fluid" > 
            <br>
            <p class="text-center">Hotel-rental.com</p>
			<div class="row">
            <br>
				<div class="col-lg-12">
				  <div class="alert alert-danger" role="alert" id="error" style="display: none;">...</div>
				  <form id="login-form" name="login_form" role="form" style="display: block;" method="post">
					  <div class="form-group">
						<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value=""  required>
					  </div>
					  <div class="form-group">
						<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password"> 
					  </div>
					  <div class="col-xs-12 form-group pull-right">     
							<button type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-primary">
							 <span class="spinner"><i class="icon-spin icon-refresh" id="spinner"></i></span> Sign In
							</button>
					  </div>
				  </form>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>