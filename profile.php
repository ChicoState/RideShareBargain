<?php
require 'configurations/config.php';

if (isset($_SESSION['username'])) {
	$user_signin = $_SESSION['username'];
	$user_detail_query = mysqli_query($con, "SELECT * FROM users WHERE username = '$user_signin';");
	$user = mysqli_fetch_array($user_detail_query);
} else {
	header("Location: signup.php");
}

?>

<html>
<head>
	<title>RideShareBargain</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script type="styling/javascript/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="styling/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="styling/css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
	<div class="top_nav_bar">
		<div class="logo">
			<a href="index.php"><img class="image" src="styling/img/rsb.png"></a>
		</div>
		<nav>
			<a href="<?php echo $user_signin;?>">
				<?php
					echo $user['firstname'];
				?>
			</a>
			<a href="index.php"><i class="fas fa-home"></i></a>
			<a href="#"><i class="fas fa-bell"></i></a>
			<a href="#"><i class="fas fa-envelope"></i></a>
			<a href="filter.php"><i class="fas fa-car-alt"></i></a>
			<a href="#"><i id="settings" class="fas fa-cog"></i></a>
			<a href="signout.php"><i class="fas fa-sign-out-alt"></i></a>
		</nav>
		</div>
		<?php
			if(isset($_GET['profile_username'])) {
				$username = $_GET['profile_username'];
				$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
				$user_array = mysqli_fetch_array($user_details_query);
				$num_followers = (substr_count($user_array['followers_array'], ",")) - 1;
			}
		?>
		<div class="big_profile">
			<div class="user column">
				<a href="<?php echo $user_signin;?>">
					<img id="pro_img" src="<?php echo $user['profile_pic'];?>">
				</a>
				<div class="index_user_profile">
					<a href="profile.php">
						<?php
							echo $user['firstname'] . " " . $user['lastname'] . "<br>";
						?>
					</a>
					<div class=profile_info_p>
						<p><?php echo "Posts  : " . $user['num_posts'];?></p>
						<p><?php echo "Driver Rating : " . $user['rating_driver']?></p>
						<p><?php echo "Rider Rating : " . $user['rating_rider'];?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="newsfeed column">
			<form action="upload.php" method="post" enctype="multipart/form-data">
    				Select image to upload:
    				<input type="file" name="fileToUpload" id="fileToUpload">
    				<input type="submit" value="Upload Image" name="submit">
			</form>
		
		</div>
		
	</div>
</body>
</html>
