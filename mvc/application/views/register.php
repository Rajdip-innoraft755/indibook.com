<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<title>INDIBOOK.COM</title>
	<link rel="stylesheet" href="<?php echo BASEURL ?>/assets/css/homeIndex.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<div class="wrapper">
		<div class="title-text">
			<div class="title signup">Signup Form</div>
		</div>
		<div class="form-container">
			<div class="form-inner">
				<form action="<?php echo BASEURL; ?>/home/register" class="signup" method="POST">
					<div class="field" id="fName">
						<input type="text" placeholder="First Name"  name="fName" required>
						<label class="error">
							<?php if (isset($_SESSION["Err"]["fName"])) {
								echo $_SESSION["Err"]["fName"];
								unset($_SESSION["Err"]["fName"]);
							} ?>
						</label>
					</div>
					<div class="field" id="lName">
						<input type="text" placeholder="Last Name"  name="lName" required>
						<label class="error">
							<?php if (isset($_SESSION["Err"]["lName"])) {
								echo $_SESSION["Err"]["lName"];
								unset($_SESSION["Err"]["lName"]);
							} ?>
						</label>
					</div>
					<div class="field" id="userId">
						<input type="text" placeholder="User ID"  name="userId" required>
						<label class="error">
							<?php if (isset($_SESSION["Err"]["userId"])) {
								echo $_SESSION["Err"]["userId"];
								unset($_SESSION["Err"]["userId"]);
							} ?>
						</label>
					</div>
					<div class="field" id="emailId">
						<input type="text" placeholder="Email Address"  name="emailId" required>
						<label class="error">
							<?php if (isset($_SESSION["Err"]["emailId"])) {
								echo $_SESSION["Err"]["emailId"];
								unset($_SESSION["Err"]["emailId"]);
							} ?>
						</label>
					</div>
					<div class="field" id="password">
						<input type="password" placeholder="Password"  name="password" required>
						<label class="error">
							<?php if (isset($_SESSION["Err"]["password"])) {
								echo $_SESSION["Err"]["password"];
								unset($_SESSION["Err"]["password"]);
							} ?>
						</label>
					</div>
					<div class="field btn">
						<div class="btn-layer"></div>
						<input type="submit" value="Sign Up" id="signUp">	
					</div>
					<div class="field btn">
						<div class="btn-layer"></div>
						<button><a href="<?php echo BASEURL; ?>">Go Back</a></button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="<?php echo BASEURL ?>/assets/js/jquery.min.js"></script>
	<script src="<?php echo BASEURL ?>/assets/js/register.js"></script>

</body>

</html>