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
					<a href="<?php echo $user_signin;?>">
						<?php
							echo $user['firstname'] . " " . $user['lastname'] . "<br>";
						?>
					</a>
					<div class=profile_info_p>
						<p><?php echo "Posts  : " . $user['num_posts'];?></p>
						<p><?php echo "Followers : " . $num_followers;?></p>
						<p><?php echo "Driver Rating : " . $user['rating_driver']?></p>
						<p><?php echo "Rider Rating : " . $user['rating_rider'];?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="newsfeed column">
			<?php echo $username; ?>
			<!-- <form class="create_post" action="addComment.php" method="POST">
				<textarea name="new_text" id="new_text" placeholder="What's on your mind, <?php echo $user['firstname'];?>?"></textarea>
				<input type="submit" name="new_post" id="post_button" value="Post">
			</form> -->
		</div>
		<!-- <table>
			<?php
				echo $username;
				// $sql = "SELECT content FROM comments WHERE owner = '$user_signin '";
				// $query = mysqli_query($con, $sql);
				// while ($row = mysqli_fetch_row($query)) {
				// 	echo "<tr>";
				// 	echo ('<div class="newsfeed column">');
				//   echo stripslashes(utf8_decode($row[0]));
				// }
				// echo "</div>";
				// echo "</tr>";
			?>
		</table> -->
	</div>
</body>
</html>