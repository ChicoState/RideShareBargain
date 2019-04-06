<?php
require 'configurations/config.php';

if (isset($_SESSION['username'])) {
	$user_signin = $_SESSION['username'];
	$user_detail_query = mysqli_query($con, "SELECT id FROM users WHERE username = '$user_signin';");
	$user = mysqli_fetch_array($user_detail_query);
} else {
	header("Location: signup.php");
}

$time = date('Y-m-d H:i:s');
$comment = mysqli_real_escape_string($con, utf8_encode($_POST['new_text']));
$query = "insert into `rsb`.`comments` (`id`, `content`, `owner`, `reciever`, `date`, `post_id`) VALUES (NULL, '$comment', '$user_signin', 'vc', '$time', '1');";
echo "insert into `rsb`.`comments` (`id`, `content`, `owner`, `reciever`, `date`, `post_id`) VALUES (NULL, '$comment', '$user_signin', 'vc', '$time', '1');";
mysqli_query($con, "UPDATE users SET num_posts = num_posts + 1 WHERE username = '$user_signin';");
if(mysqli_query($con, $query))
{
  echo "bien";
}

header("location:index.php");
?>