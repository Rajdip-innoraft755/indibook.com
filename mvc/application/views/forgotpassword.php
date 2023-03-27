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
    <div class="loader">
      <img src="/assets/img/loader.gif" alt="">
    </div>
    <div class="title-text">
      <div class="title login">FORGOT PASSWORD</div>
    </div>
    <div class="form-container">
      <div class="form-inner">

        <form class="login">
          <div class="field" id="userId">
            <div class="field-inner">
              <input type="text" placeholder="User ID" id="userId-input" name="userId" value="<?php if (isset($_POST["userId"])) {
                echo $_POST["userId"];
              } ?>" required>
              <input type="button" class="forgot-btn" id="send-otp" value="SEND OTP">
            </div>
            <span class="error"></span>
          </div>

          <div class="field" id="otp">
            <div class="field-inner">
              <input type="text" placeholder="OTP received in your email" id="otp-input" name="otp" value="<?php if (isset($_POST["otp"])) {
                echo $_POST["otp"];
              } ?>" required disabled>
              <input type="button" class="forgot-btn" id="verify-otp" value="VERIFY OTP" disabled>
            </div>
            <span class="error"></span>
          </div>

          <div class="field" id="password">
            <div class="field-inner">
              <div class="password-input">
                <input type="password" placeholder="New Password" id="pass" name="password" required disabled>
                <i id="eye" class="fa-regular fa-eye"></i></input>
              </div>
              <input type="button" class="forgot-btn" id="reset-password" value="RESET PASSWORD" disabled>
            </div>
            <span class="error"></span>
          </div>
        </form>
        <div id="forgot-to-login">
          <button class="forgot-btn"><a href="/home">Go TO LOG IN PAGE</a></button>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/js/forgotpassword.js"></script>
  <script src="/assets/js/fontawesome.js" crossorigin="anonymous"></script>
</body>

</html>