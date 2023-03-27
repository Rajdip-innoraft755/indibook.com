<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INDIBOOK.COM</title>
  <link rel="shortcut icon" href="/assets/img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="/assets/css/profile.css">
</head>

<body>
  <div class="container">
    <header>
      <div class="navbar">
        <div class="logo">
          <a href="/landing"><img src="/assets/img/logo.png" alt="">
            <p>INDIBOOK</p>
          </a>
        </div>
        <div class="profile">
          <h3 id="slide-menu">
            <?php echo $_SESSION["userName"] ?>
            <i class="fa-solid fa-bars"></i>
          </h3>
          <div class="profile-menu">
            <ul>
              <li><a href="/landing">Home</a></li>
              <li><a href="/home/logout">Logout</a></li>
            </ul>
          </div>
          <div class="theme">
						<i class="fa-solid fa-circle-half-stroke" id="theme"></i>
					</div>
        </div>
      </div>
    </header>

    <form action="/landing/updateProfile" method="POST" enctype="multipart/form-data">
      <section class="profile">
        <div class="wrapper">
          <div class="left">
            <div class="profile-pic">
              <img id="preview" src="<?php echo Profile::$profilePic ?>" alt="">
              <i class="fa-solid fa-file-arrow-up" id="file-upload-btn"></i>
              <input type="file" id="file-upload-input" accept="image/*" name="imgUpload">
            </div>
            <div class="bio">
              <h3 class="tittle">Your Bio ...</h3>
              <textarea name="bio" rows="2"
                placeholder="write somthing about you ..."><?php echo Profile::$bio ?></textarea>
            </div>
          </div>

          <div class="right">
            <div class="input-field name">
              <div class="first-name" id="fName">
                <h3 class="tittle">First Name</h3>
                <input type="text" placeholder="your first name" name="fName"
                  value="<?php echo isset($_POST["fName"]) ? $_POST["fName"] : Profile::$fName; ?>" required>
                <span class="error"></span>
              </div>
              <div class="last-name" id="lName">
                <h3 class="tittle">Last Name</h3>
                <input type="text" placeholder="your last name" name="lName" value="<?php echo Profile::$lName; ?>"
                  required>
                <span class="error"></span>
              </div>
            </div>

            <div class="input-field ">
              <h3 class="tittle">User Id</h3>
              <input type="text" placeholder="your user Id" name="userId" value="<?php echo $_SESSION["userId"] ?>"
                readonly>
            </div>

            <div class="input-field" id="emailId">
              <h3 class="tittle">Email ID</h3>
              <input type="text" placeholder="your email Id" name="emailId" value="<?php echo Profile::$emailId ?>"
                required>
              <span class="error"></span>
            </div>

            <div class="input-field" id="password">
              <h3 class="tittle">Enter Your Password To Update your Profile</h3>
              <div class="password-input">
                <input type="password" placeholder="Password" id="pass" name="password" required>
                <i id="eye" class="fa-regular fa-eye"></i></input>
              </div>
              <span class="error"></span>
            </div>
          </div>
        </div>
        <div class="btn">
          <input type="submit" value="Update Profile" id="update">
        </div>
      </section>
    </form>
  </div>
  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/js/profile.js"></script>
  <script src="/assets/js/fontawesome.js" crossorigin="anonymous"></script>
</body>

</html>