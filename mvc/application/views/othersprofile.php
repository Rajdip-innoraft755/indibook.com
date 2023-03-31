<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#fa4299">
  <title>INDIBOOK.COM</title>
  <link rel="shortcut icon" href="/assets/img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="/assets/css/othersprofile.css">

  <script src="/assets/js/jquery.min.js"></script>
  <script src="/assets/js/dashboard.js"></script>
  <script src="/assets/js/fontawesome.js" crossorigin="anonymous"></script>
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
    <section class="profile">
      <div class="wrapper">
        <div class="left">
          <div class="profile-pic">
            <img id="preview" src="<?php echo OthersProfile::$profilePic ?>" alt="">
          </div>
          <div class="details userid">
            <i class="fa-solid fa-id-card"></i>
            <h3>
              <?php echo OthersProfile::$userId ?>
            </h3>
          </div>
          <div class="details name">
            <i class="fa-solid fa-user"></i>
            <h3>
              <?php echo OthersProfile::$name ?>
            </h3>
          </div>
          <div class="details email">
            <i class="fa-solid fa-envelope"></i>
            <h3>
              <?php echo OthersProfile::$emailId ?>
            </h3>
          </div>
          <div class="details bio">
            <i class="fa-solid fa-pen"></i>
            <p>
              <?php echo OthersProfile::$bio ?>
            </p>
          </div>
        </div>

        <div class="right">
          <div class="posts">
            <section class="all-post">
              <div class="post-section">
                <?php
                for ($k = 0; $k < OthersProfile::$postNo; $k++) {
                  ?>
                  <div class="post-item">
                    <div class="post-author">
                      <a href="/landing/user/<?php echo base64_encode(OthersProfile::$userId); ?>">
                        <div>
                          <img src="<?php echo OthersProfile::$profilePic; ?>" alt="">
                        </div>
                        <div class="user-name">
                          <h4>
                            <?php echo OthersProfile::$name; ?>
                          </h4>
                        </div>
                      </a>
                    </div>
                    <div class="post-content">
                      <div class="image">
                        <img src="<?php echo OthersProfile::$postImage[$k]; ?>" alt="">
                      </div>
                      <div class="text-box">
                        <?php
                          echo OthersProfile::$postContent[$k];
                        ?>
                      </div>
                    </div>
                    <div class="post-reaction">
                      <div class="react-icon">
                        <div class="react">
                          <button><i class="fa-regular fa-heart react"></i></button>
                        </div>
                        <div class="comment" id="comment">
                          <button><i class="fa-regular fa-comment comment-btn"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                }
                ?>
              </div>
              <?php ?>
            </section>
        </div>
      </div>
  </div>
  </section>
  </div>

</body>

</html>