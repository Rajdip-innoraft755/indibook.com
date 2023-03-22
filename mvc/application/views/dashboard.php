<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>INDIBOOK.COM</title>
	<link rel="stylesheet" href="/assets/css/dashboard.css">
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
						<?php echo Dashboard::$userName ?>
					</h3>
					<div class="profile-menu">
						<ul>
							<li><a href="/landing/profile">Profile</a></li>
							<li><a href="/home/logout">Logout</a></li>
							<li><a href="">Delete Account</a></li>
						</ul>
					</div>
				</div>
			</div>
		</header>

		<section class="body">
			<div class="container">
				<div class="wrapper">
					<div class="active-user">
						<h2>Active Users</h2>
						<?php
						for ($i = 0; $i < Dashboard::$activeUserNo; $i++) {
							?>
							<a href="">
								<div class="user">
									<div class="profile-pic">
										<img src="<?php echo Dashboard::$activeUserProfilePic[$i] ?>" alt="">
									</div>
									<div class="user-name">
										<h4>
											<?php echo Dashboard::$activeUserName[$i]; ?>
										</h4>
									</div>
								</div>
							</a>
							<?php
						}
						?>
					</div>

					<div class="posts">
						<div class="user-post">
							<form class="post-input" method="POST" action="/landing/makePost">
								<img id="preview" src="" alt="">
								<textarea name="postContent" id="postContent" placeholder="whats on your mind" required></textarea>
								</textarea>
								<button>
									<i class="fa-solid fa-camera" id="file-upload-btn"></i>
									<input type="file" name="postImage" id="file-upload-input">
								</button>
								<button id="postBtn"><i class="fa-solid fa-paper-plane"><input type="submit" value=""></i></button>
							</form>
						</div>
						<?php
						for ($i = 0; $i < Dashboard::$postNo; $i++) {
							?>
							<div class="post-item">
								<div class="post-author">
									<div class="profile-pic">
										<img src="<?php echo Dashboard::$postAuthorProfilePic[$i]; ?>" alt="">
									</div>
									<div class="user-name">
										<h4>
											<?php echo Dashboard::$postAutor[$i]; ?>
										</h4>
									</div>
								</div>
								<div class="post-content">
									<div class="image">
										<img src="<?php echo Dashboard::$postImage[$i]; ?>" alt="">
									</div>
									<div class="text-box">
										<?php
										echo Dashboard::$postContent[$i];
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
									<!-- <div class="comment-section" id="comment-section">
										<?php
										// for ($j = 0; $j < 3; $j++) {
											?>
											<div class="comment-item">
												<div class="comment-author">
													<h5>User Name</h5>
												</div>
												<div class="comment-text">
													<p>
														Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, distinctio totam. In
														provident dolorum sapiente officiis odio recusandae
													</p>
												</div>
											</div>
											<?php
										// }
										?>
									</div> -->
								</div>
							</div>
							<?php
						}
						?>
						<div class="show-more">
							<div class="loader">
								<img src="/assets/img/loader.gif" alt="">
							</div>
							<input type="button" id="show-btn" value="See more ..." href="/landing/loadmore">
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/js/dashboard.js"></script>
	<script src="https://kit.fontawesome.com/2a48c31384.js" crossorigin="anonymous"></script>
</body>

</html>