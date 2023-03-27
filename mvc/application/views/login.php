<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<title>INDIBOOK.COM</title>
	<link rel="shortcut icon" href="/assets/img/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="/assets/css/homeIndex.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<div class="sidebar">
		<ul>
			<li class="icon">
				<a href="<?php echo BASEURL; ?>"><i class="fa-solid fa-house"></i>LOGIN</a>		
			</li>
			<li class="icon">
				<a href="/home/registerview"><i class="fa-solid fa-user-plus"></i>REGISTER</a>		
			</li>
			<li class="icon" id="theme">
				<a><i class="fa-solid fa-circle-half-stroke" id="theme-btn"></i>THEME</a>
			</li>
			<li class="icon" id="theme">
				<a href="mailto:royrajdip10@gmail.com"><i class="fa-solid fa-phone" id="theme-btn"></i>Contact Us</a>
			</li>
		</ul>
	</div>
	<div class="wrapper">
		<div class="logo">
			<a href="/landing"><img src="/assets/img/logo.png" alt="">
				<p>INDIBOOK</p>
			</a>
		</div>
		
		<div class="title-text">
			<div class="title login">USER LOGIN</div>
		</div>
		<div class="form-container">
			<div class="form-inner">
				<form action="/home/login/" method="POST" class="login">
					<div>
						<span class="error">
							<?php ErrorMsg::getter("logIn"); ?>
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
	<script src="/assets/js/fontawesome.js" crossorigin="anonymous"></script>
</body>

</html>