<?php
$fname = "";
$lname = "";
$email = "";
$password = "";
$password_confirm = "";
$date = "";
$error_array = array();

if (isset($_POST['signup'])) {
	/* first name */
	// remove html tags
	$fname = strip_tags($_POST['signup_fname']);
	// remove spaces
	$fname = str_replace(' ', '', $fname);
	// first letter uppercase
	$fname = ucfirst(strtolower($fname));
	// stores first name into session variable
	$_SESSION['signup_fname'] = $fname;

	/* last name */
	// remove html tags
	$lname = strip_tags($_POST['signup_lname']);
	// remove spaces
	$lname = str_replace(' ', '', $lname);
	// first letter uppercase
	$lname = ucfirst(strtolower($lname));
	// stores last name into session variable
	$_SESSION['signup_lname'] = $lname;

	/* email */
	// remove html tags
	$email = strip_tags($_POST['signup_email']);
	// remove spaces
	$email = str_replace(' ', '', $email);
	// lowercase
	$email = strtolower($email);
	// stores email into session variable
	$_SESSION['signup_email'] = $email;

	/* password */
	// remove html tags
	$password = strip_tags($_POST['signup_password']);
	// stores password into session variable
	$_SESSION['signup_password'] = $password;

	/* password confirmation */
	// remove html tags
	$password_confirm = strip_tags($_POST['signup_password_confirm']);
	// stores password confirmation into session variable
	$_SESSION['signup_password_confirm'] = $password_confirm;

	/* date */
	// current date
	$date = date("y-m-d");

	/*if valid email*/
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$email = filter_var($email, FILTER_VALIDATE_EMAIL);
		// check if email is occupied
		$e_check = mysqli_query($con, "SELECT email FROM users WHERE email = '$email'");
		// count the number of rows returned
		$num_rows = mysqli_num_rows($e_check);
		if ($num_rows > 0) {
			array_push($error_array, "Email already in use\n");
		}
	} else {
		array_push($error_array, "Invalid format\n");
	}
	if (strlen($fname) > 20 || strlen($fname) < 2) {
		array_push($error_array, "Your first name must be between 2 and 25 characters\n");
	}
	if (strlen($fname) > 30 || strlen($fname) < 2) {
		array_push($error_array, "Your last name must be between 2 and 30 characters\n");
	}
	// check if password entered is same
	if ($password != $password_confirm) {
		array_push($error_array, "password is not same\n");
	} else {
		if (preg_match('/[^A-Za-z0-9]/', $password)) {
			array_push($error_array, "Your password can only contain chars or numbers\n");
		}
	}
	if (strlen($password) > 30 || strlen($password) < 5) {
		array_push($error_array, "Your password must be between 5 and 30 characters\n");
	}
	// encrypting the password
	if (empty($error_array)) {
		$password = md5($password);
		$username = strtolower($fname . "_" . $lname);
		$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username';");
		$i = 0;
		// if username exists add number to username
		// $temp = "";
		while(mysqli_num_rows($check_username_query) != 0) {
			$i++;
			$username = $username . "_" . $i;
			$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username';");
		}
		// $username = $temp;
		// Profile picture assignment
		$profile_pic = "styling/img/profile_pic/default_pics/default.png";
		$query = mysqli_query($con, "INSERT INTO users VALUES ('', '$fname', '$lname', '$username', '$email', '$password', '$date', '$profile_pic', '0', 'no', '0', '0', ',');");
		array_push($error_array, "<span>Thanks for signing up. now signin.<span><br>");
		// clear session variable
		$_SESSION['signup_fname'] = "";
		$_SESSION['signup_lname'] = "";
		$_SESSION['signup_email'] = "";
	}
}

?>