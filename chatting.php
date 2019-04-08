<?php
	include("header_files/header.php");
	include('User.php');
	include('Post.php');
	include('chat.php');
	// require ('styling/css/style.css');
	$user_name = $_SESSION['username'];
	$object_chat = new Chat($con, $user_name);
	if(isset($_GET['name_of_user'])) {
		$user_recv = $_GET['name_of_user'];
	}
	else {
		$user_recv = $object_chat->get_recent_user();
		if ($user_recv == false)
			$user_recv = 'new';
	}
	if ($user_recv != 'new')
		$object_user_recv = new User($con, $user_recv);
	if(isset($_POST['post_chat'])) {
		if(isset($_POST['message_body'])) {
			$body = mysqli_real_escape_string($con, $_POST['message_body']);
			$date = date("Y-m-d H:i:s");
			$object_chat->send_chat($user_recv, $body, $date);
		}
	}
?>

<div class="little_profile">
	<div class="user column">
		<a href="<?php echo $user; ?>">  <img src="<?php echo $user['profile_pic']; ?>"> </a>

		<div class="user_details_left_right">
			<a href="<?php echo $user['username'] ?>">
			<?php 
				echo $user['firstname'] . " " . $user['lastname'];
			 ?>
			</a>
			<br>
		</div>
	</div>
	<div class="newsfeed column">
		<div class="chat">
			<form action="" method="POST">
				<?php
					echo "<h4>You and <a href='$user_recv'>" . $object_user_recv->get_first_last_name() . "</a></h4><hr><br>";
					if ($user_recv != "new") {
						echo "<textarea name='message_body' id='new_text' placeholder='Write your message ...'></textarea>";
						echo "<input type='submit' name='post_chat' class='info' id='post_button' value='Send'>";
					}
				?>
			</form>
		</div>
		<?php
			if ($user_recv != 'new') {
				echo "<div class='chat'>";
				echo $object_chat->get_chat($user_recv);
				echo "</div>";
			}
		?>
	</div>
</div>








