<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>INDIBOOK.COM</title>
	<link rel="stylesheet" href="<?php echo BASEURL ?>/assets/css/landing.css">
</head>

<body>
	<div class="container">
		<header>

			<div class="navbar">
				<div class="logo">
					<a href="#"><img src="<?php echo BASEURL ?>/assets/img/logo.png" alt="">
						<p>INDIBOOK</p>
					</a>
				</div>
				<div class="profile">
					<a href="">
						<h3>
							<?php echo $_SESSION["userName"]; ?>
						</h3>
					</a>
				</div>
			</div>


		</header>


		<section class="body">
			<div class="container">
				<div class="wrapper">
					<div class="active-user">
						<h2>Active Users</h2>
						<?php
						for ($i = 0; $i < 5; $i++) {
							?>
							<a href="">
								<div class="user">
									<div class="profile-pic">
										<img src="<?php echo BASEURL ?>/assets/img/logo.png" alt="">
									</div>
									<div class="user-name">
										<h4>user name</h4>
									</div>
								</div>
							</a>
							<?php
						}
						?>
					</div>
					<div class="posts">
						<?php
						for ($i = 0; $i < 10; $i++) {
							?>
							<div class="post-item">
								<div class="post-author">
									<div class="profile-pic">
										<img src="<?php echo BASEURL ?>/assets/img/logo.png" alt="">
									</div>
									<div class="user-name">
										<h4>user name</h4>
									</div>
								</div>
								<div class="post-content">
									<div class="image">

									</div>
									<div class="text-box">
										<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus nulla ipsa adipisci ea alias
											incidunt, voluptates dicta provident, reiciendis, deserunt id eius quos nam et. Rerum quibusdam vel
											itaque dolorum!
										</p>
									</div>
								</div>
								<div class="post-reaction">
									<div class="react">
										<button>like</button>
									</div>
									<div class="comment">
										<button>Comment</button>
										<div class="comment-section">

										</div>
									</div>
								</div>
							</div>
							<?php
						}
						?>

					</div>
				</div>
			</div>
		</section>
	</div>

	
	<script src="https://kit.fontawesome.com/2a48c31384.js" crossorigin="anonymous"></script>
</body>

</html>