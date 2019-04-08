<?php
include ("header_files/header.php");
include ("User.php");
include ("Post.php");
include ('chat.php');
if(isset($_POST['post'])) {
	$post = new Post($con, $user_signin);
	$post->submit_post($_POST['new_text'], 'none');
}
?>
	<div class="little_profile">
		<div class="user column">
			<a href="<?php echo $user_signin;?>">
				<img src="<?php echo $user['profile_pic'];?>">
			</a>
			<div class="index_user">
				<a href="<?php echo $user_signin;?>">
					<?php
						echo $user['firstname'] . " " . $user['lastname'] . "<br>";
					?>
				</a>
				<div class=profile_info>
					<?php echo "Driver Rating : " . $user['rating_driver'] . "<br>";?>
					<?php echo "Rider Rating : " . $user['rating_rider'];?>
				</div>
			</div>
		</div>
	</div>
	<div class="newsfeed column">
		<form class="create_post" action="index.php" method="POST">
			<textarea name="new_text" id="new_text" placeholder="What's on your mind, <?php echo $user['firstname'];?>?"></textarea>
			<input type="submit" name="post" id="post_button" value="Post">
		</form>
		<?php
			$post = new Post($con, $user_signin);
			$post->show_post_followers();
		?>
	</div>
</body>
</html>