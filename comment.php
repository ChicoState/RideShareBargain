<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="styling/css/style.css">
	</head>
	<body>
		<?php
			require 'configurations/config.php';
			include ("User.php");
			include ("Post.php");
			if (isset($_SESSION['username'])) {
				$user_signin = $_SESSION['username'];
				$user_detail_query = mysqli_query($con, "SELECT * FROM users WHERE username = '$user_signin';");
				$user = mysqli_fetch_array($user_detail_query);
			} else {
				header("Location: signup.php");
			}
		?>
		<script>
			function toggle() {
				if (document.getElementById("comment").style.display == "block")
					document.getElementById("comment").style.display = "none";
				else
					document.getElementById("comment").style.display = "block";
			}
		</script>
		<?php
			if (isset($_GET['post_id']))
				$post_id = $_GET['post_id'];
			$query = mysqli_query($con, "SELECT owner, reciever FROM posts WHERE id ='$post_id'");
			$row = mysqli_fetch_array($query);
			$posted_to = $row['owner'];
			if (isset($_POST['postComment' . $post_id])) {
				$post_body = $_POST['post_body'];
				$post_body = mysqli_escape_string($con, $post_body);
				$time = date("Y-m-d H:i:s");
				$insert_post = mysqli_query($con, "INSERT INTO comments VALUES ('', '$post_body', '$user_signin', '$posted_to', '$time', '$post_id');");
			}
		?>
		<form action="comment.php?post_id=<?php echo $post_id;?>" id="comment_form" name="postComment<?php echo $post_id;?>" method="POST">
			<textarea name="post_body"></textarea>
			<input id = "comment_post_b" type="submit" name="postComment<?php echo $post_id;?>" value="Post">
		</form>
		<?php
			$get_comments = mysqli_query($con, "SELECT * FROM comments WHERE post_id = '$post_id' ORDER BY id ASC");
			$count = mysqli_num_rows($get_comments);
			if ($count != 0) {
				while ($comment = mysqli_fetch_array($get_comments)) {
					$comment_body = $comment['content'];
					$owner = $comment['owner'];
					$reciever = $comment['reciever'];
					$date = $comment['date'];
					$object_user = new User($con, $owner);
					?>
					<hr id = "hr">
					<div class="comment_section">
						<a href="<?php echo $owner ?>" target="_parent">
							<img src="<?php echo $object_user->profile_pic()?>" title="<?php echo $owner;?>" style="float:left; border-radius: 100%; margin: 0 3px 3px 10%; border-bottom: 3px;" height="30">
						</a>
						<a href="<?php echo $owner ?>" target="_parent">
							<b><?php echo $object_user->get_first_last_name(); ?></b>
						</a>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<?php echo $date; ?>
						&nbsp;&nbsp;&nbsp;&nbsp;
						<a id="chat" href='http://localhost:8080/RideShareBargain/chatting.php?name_of_user=<?php echo $owner; ?>' target="_blank">chat</a><br> 
						<?php echo $comment_body; ?>
					</div>
					<?php
				}
			}
		?>
	</body>
</html>