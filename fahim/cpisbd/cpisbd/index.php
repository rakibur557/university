<?php 
	require 'confiq.php';

	if(isset($_POST['submit'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$captcha = $_POST['captcha'];
		$confirmCaptcha = $_POST['confirmCaptcha'];

		if($captcha != $confirmCaptcha){
			echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
					<strong>Invalid Captcha</strong>
					<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
				  </div>";
		}
		else{
			//METHOD-2: TO FETCH DATABASE USER CREDENTIAL
			$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM user WHERE email = '$email'"));
			if (isset($row) && $password == $row["password"]) {
				$_SESSION['id'] = $row["id"];
				header("Location: home.php");
			}
			else{
					echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
					<strong>Wrong password or email.</strong>
					<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
				  </div>";
				}
		}

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Covid Patient Info</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda+One">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

<style>
body {
	color: #999;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
}
.form-control {
	box-shadow: none;
	border-color: #ddd;
}
.form-control:focus {
	border-color: #4aba70; 
}
.login-form {
	width: 350px;
	margin: 0 auto;
	padding: 30px 0;
}
.login-form form {
	color: #434343;
	border-radius: 1px;
	margin-bottom: 15px;
	background: #fff;
	border: 1px solid #f3f3f3;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.login-form h4 {
	text-align: center;
	font-size: 22px;
	margin-bottom: 20px;
}
.login-form .avatar {
	color: #fff;
	margin: 0 auto 30px;
	text-align: center;
	width: 100px;
	height: 100px;
	border-radius: 50%;
	z-index: 9;
	background: #4aba70;
	padding: 15px;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}
.login-form .avatar i {
	font-size: 62px;
}
.login-form .form-group {
	margin-bottom: 20px;
}
.login-form .form-control, .login-form .btn {
	min-height: 40px;
	border-radius: 2px; 
	transition: all 0.5s;
}
.login-form .close {
	position: absolute;
	top: 15px;
	right: 15px;
}
.login-form .btn, .login-form .btn:active {
	background: #4aba70 !important;
	border: none;
	line-height: normal;
}
.login-form .btn:hover, .login-form .btn:focus {
	background: #42ae68 !important;
}
.login-form .checkbox-inline {
	float: left;
}
.login-form input[type="checkbox"] {
	position: relative;
	top: 2px;
}
.login-form .forgot-link {
	float: right;
}
.login-form .small {
	font-size: 13px;
}
.login-form a {
	color: #4aba70;
}
</style>
</head>
<body>
<div class="login-form">    
    <form action="" method="post">
		<div class="avatar"><i class="material-icons">&#xE7FF;</i></div>
    	<h4 class="modal-title">Admin Login</h4>
        <div class="form-group">
            <input type="text" name="email" value="" class="form-control" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" value="" class="form-control" placeholder="Password" required="required">
        </div>
        <!-- New -->
        <div class="form-group">
            <input type="text" class="captcha form-control" name="captcha" readonly value="<?php echo substr(uniqid(), 5); ?>">
        </div>
        <div class="form-group">
            <input type="text" class="captcha form-control" name="confirmCaptcha" placeholder="Captcha" value="">
        </div>

        <input type="submit" name="submit" class="btn btn-primary btn-block btn-lg" value="Login">              
    </form>			
    
</div>


<!-- Js CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>