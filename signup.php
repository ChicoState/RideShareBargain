<?php
require 'configurations/config.php';
require 'header_files/form/signup_form.php';
require 'header_files/form/signin_form.php';
?>

<html>
<head>
	<title>RSB - Sign in or Sign up</title>
	<link rel="stylesheet" type="text/css" href="styling/css/signup.css">
</head>
<body>
	<header>
		<nav>
			<div class="top_nav">
				<img class="logo" src="styling/img/rsb2.png">
				<div class="signin_form">
					<form action="signup.php" method="POST">
						<input type="email" name="signin_email" placeholder=" Email" value="<?php
						if (isset($_SESSION['signin_email'])) {
							echo $_SESSION['signin_email'];
						}?>" required>
						<input type="password" name="signin_password" placeholder=" Password">
						<input  id="signin_button" type="submit" name="signin" value="Sign in">
						<?php if (in_array("Email or Password is incorrect<br>", $error_array)) {
							echo "<br>Email or Password is incorrect<br>";
						}
						?>
					</form>
				</div>
			</div>
		</nav>
		<div class = "sign_up_form">
			<form action="signup.php" method="POST">
			<input type="text" name="signup_fname" placeholder=" First name" value="<?php
			if (isset($_SESSION['signup_fname'])) {
				echo $_SESSION['signup_fname'];
			}
			?>" required>
			<br>
			<?php if (in_array("Your first name must be between 2 and 25 characters\n", $error_array))
			 			echo "Your first name must be between 2 and 25 characters<br>"; ?>
			<input type="text" name="signup_lname" placeholder=" Last name" value="<?php
			if (isset($_SESSION['signup_lname'])) {
				echo $_SESSION['signup_lname'];
			}
			?>" required>
			<br>
			<?php if (in_array("Your last name must be between 2 and 30 characters\n", $error_array))
			 			echo "Your last name must be between 2 and 30 characters<br>"; ?>
			<input type="email" name="signup_email" placeholder=" Email" value="<?php
			if (isset($_SESSION['signup_email'])) {
				echo $_SESSION['signup_email'];
			}
			?>" required>
			<br>
			<?php if (in_array("Email already in use\n", $error_array))
			 			echo "Email already in use<br>"; ?>
			<?php if (in_array("Invalid format\n", $error_array))
			 			echo "Invalid format<br>"; ?>
			<input type="password" name="signup_password" placeholder=" Password" required>
			<br>
			<?php if (in_array("password is not same\n", $error_array))
			 			echo "password is not same<br>"; ?>
			<?php if (in_array("Your password can only contain chars or numbers\n", $error_array))
			 			echo "Your password can only contain chars or numbers<br>"; ?>
			<?php if (in_array("Your password must be between 5 and 30 characters\n", $error_array))
			 			echo "Your password must be between 5 and 30 characters<br>"; ?>
			<input type="password" name="signup_password_confirm" placeholder=" Confirm Password" required>
			<br>
			<?php if (in_array("Email already in use\n", $error_array))
			 			echo "Email already in use<br>"; ?>
			<input id="signup_button" type="submit" name="signup" value="Sign up">
			<br>
			<?php if (in_array("<span>Thanks for signing up. now signin.<span><br>", $error_array))
			 			echo "<span>Thanks for signing up. now signin.<span><br>"; ?>
			</form>
		</div>
	<header>
</body>
</html>