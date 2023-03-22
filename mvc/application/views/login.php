<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<title>INDIBOOK.COM</title>
	<link rel="stylesheet" href="/assets/css/homeIndex.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<div class="wrapper">
		<div class="title-text">
			<div class="title login">USER LOGIN</div>
		</div>
		<div class="form-container">
			<div class="form-inner">
				<form action="/home/login/" method="POST" class="login">
					<div>
						<span class="error">
							<?php  ErrorMsg::getter("logIn"); ?>
						</span>
					</div>
					<div class="field" id="userId">
						<input type="text" placeholder="User ID" name="userId" required>
						<span class="error"></span>
					</div>
					<div class="field" id="password">
						<div class="password-input">
							<input type="password" placeholder="Password" id="pass" name="password" required>
							<i id="eye" class="fa-regular fa-eye"></i></input>
						</div>
						<span class="error"></span>
					</div>
					<div class="pass-link"><a href="/home/forgotpassword/index">Forgot password?</a></div>
					<div class="field btn">
						<div class="btn-layer"></div>
						<input id="login-btn" type="submit" value="Login">
					</div>
					<div class="signup-link">Not a member? <a href="/home/registerview">Signup now</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/js/login.js"></script>
	<script src="https://kit.fontawesome.com/2a48c31384.js" crossorigin="anonymous"></script>						
</body>

</html>