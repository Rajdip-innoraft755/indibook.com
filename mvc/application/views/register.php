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
			<div class="title signup">USER REGISTRATION</div>
		</div>
		<div class="form-container">
			<div class="form-inner">
				<form action="/home/register" class="signup" method="POST" enctype="multipart/form-data">

					<div class="field" id="fName">
						<input type="text" placeholder="First Name" name="fName" required>
						<span class="error"><?php  ErrorMsg::getter("fName"); ?></span>
					</div>


					<div class="field" id="lName">
						<input type="text" placeholder="Last Name" name="lName" required>
						<span class="error">
							<?php  ErrorMsg::getter("lName"); ?>
						</span>
					</div>


					<div class="field" id="userId">
						<input type="text" placeholder="User ID" name="userId" required>
						<span class="error">
							<?php ErrorMsg::getter("userId"); ?>
						</span>
					</div>

					<span id="file-upload-label">Choose your profile picture</span>
					<div class="field" id="imgUpload">		
						<i class="fa-solid fa-file-arrow-up" id="file-upload-btn"></i>
						<input type="file" id="file-upload-input" accept="image/*" name="imgUpload" >
					</div>

					<div class="field" id="emailId">
						<input type="text" placeholder="Email Address" name="emailId" required>
						<span class="error">
							<?php echo ErrorMsg::getter("emailId"); ?>
						</span>
					</div>


					<div class="field" id="password">
						<div class="password-input">
							<input type="password" placeholder="Password" id="pass" name="password" required>
							<i id="eye" class="fa-regular fa-eye"></i></input>
						</div>
						<span class="error">
							<?php ErrorMsg::getter("password"); ?>
						</span>
					</div>


					<div class="field btn">
						<div class="btn-layer"></div>
						<input type="submit" value="Register" id="signup">
					</div>


					<div class="field btn">
						<div class="btn-layer"></div>
						<button><a href="<?php echo BASEURL; ?>">Go Back</a></button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/js/register.js"></script>
	<script src="https://kit.fontawesome.com/2a48c31384.js" crossorigin="anonymous"></script>
</body>

</html>