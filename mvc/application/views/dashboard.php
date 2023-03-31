<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#fa4299">
	<title>INDIBOOK.COM</title>
	<link rel="shortcut icon" href="/assets/img/logo.png" type="image/x-icon">
	<link rel="stylesheet" href="/assets/css/dashboard.css">
	<script src="https://apps.elfsight.com/p/platform.js" defer></script>

</head>

<body>
	<div class="container">
		<div class="loader">
			<img src="/assets/img/loader.gif" alt="">
		</div>
		<header>
			<div class="navbar">
				<div class="logo">
					<a href="/landing"><img src="/assets/img/logo.png" alt="">
						<p>INDIBOOK</p>
					</a>
				</div>
				<div class="profile">
					<h3 id="slide-menu">
						<?php echo Dashboard::$userName ?>
						<i class="fa-solid fa-bars"></i>
					</h3>
					<div class="profile-menu">
						<ul>
							<li><a href="/landing/profile">Update Profile</a></li>
							<li><a href="/home/logout">Logout</a></li>
							<!-- <li><a href="">Delete Account</a></li> -->
						</ul>
					</div>
					<div class="theme">
						<i class="fa-solid fa-circle-half-stroke" id="theme"></i>
					</div>
				</div>
			</div>
		</header>

		<section class="body">
			<div class="wrapper">
				<div class="active-user">
					<h2>Other Users</h2>
					<?php
					for ($num = 0; $num < Dashboard::$activeUserNo; $num++) {
						?>
						<a href="/landing/user/<?php echo base64_encode(Dashboard::$activeUserId[$num]); ?>"
							id="<?php echo Dashboard::$activeUserId[$num]; ?>">
							<div class="user">
								<div class="profile-pic">
									<img src="<?php echo Dashboard::$activeUserProfilePic[$num] ?>" alt="">
								</div>
								<div class="user-name">
									<h4>
										<?php echo Dashboard::$activeUserId[$num]; ?>
									</h4>
								</div>
							</div>
						</a>
						<?php
					}
					?>
				</div>

				<div class="posts">
					<!-- user post starts -->
					<div class="user-post">
						<form class="post-input" method="POST" action="/landing/makePost" enctype="multipart/form-data">
							<img id="preview" src="" alt="">
							<textarea name="postContent" id="postContent" placeholder="whats on your mind"></textarea>
							<i class="fa-solid fa-camera" id="file-upload-btn"></i>
							<input type="file" id="file-upload-input" accept="image/*" name="postImage">
							<button id="postBtn"><i class="fa-solid fa-paper-plane"><input type="submit" value=""></i></button>
						</form>
					</div>
					<!-- user post ends -->

					<!-- all post view starts-->
					<section class="all-post">
						<?php $num = 0;
						for ($j = 0; $j < (int) Dashboard::$postNo / 10; $j++) { ?>
							<div class="post-section">
								<?php
								for ($k = 0; $k < 10 && $num < Dashboard::$postNo; $k++) {
									?>
									<div class="post-item">
										<div class="post-author">
											<a href="/landing/user/<?php echo base64_encode(Dashboard::$postAuthorId[$num]); ?>">
												<div class="profile-pic">
													<img src="<?php echo Dashboard::$postAuthorProfilePic[$num]; ?>" alt="">
												</div>
												<div class="user-name">
													<h4>
														<?php echo Dashboard::$postAuthor[$num]; ?>
													</h4>
												</div>
											</a>
										</div>
										<div class="post-content">
											<div class="image">
												<img src="<?php echo Dashboard::$postImage[$num]; ?>" alt="">
											</div>
											<div class="text-box">
												<?php echo Dashboard::$postContent[$num++]; ?>
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
												<div class="elfsight-app-4ba0be1a-9dfa-40c8-8854-e06f4d56368f"></div>
											</div>
										</div>
									</div>
									<?php
								}
								?>
								<?php
								if ($num < Dashboard::$postNo) {
									?>
									<div class="show-more">
										<input type="button" class="show-btn" id="<?php echo $j ?>" value="See more ...">
									</div>
									<?php
								}
								?>
							</div>
							<?php
						} ?>
					</section>


				</div>
			</div>
		</section>
	</div>
	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/js/dashboard.js"></script>
	<script src="/assets/js/fontawesome.js" crossorigin="anonymous"></script>
</body>

</html>