<?php
	class User {
		private $user;
		private $con;
		public function __construct($con, $user) {
			$this->con = $con;
			$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$user'");
			$this->user = mysqli_fetch_array($user_details_query);
		}
		public function get_user() {
			return $this->user['username'];
		}
		public function is_closed() {
			$username = $this->user['username'];
			$query = mysqli_query($this->con, "SELECT user_closed FROM users WHERE username = '$username'");
			$row = mysqli_fetch_array($query);
			if ($row['user_closed'] == 'yes')
				return true;
			else
				return false;
		}
		public function get_num_posts() {
			$username = $this->user['username'];
			$query = mysqli_query($this->con, "SELECT num_posts FROM users WHERE username='$username'");
			$row = mysqli_fetch_array($query);
			return $row['num_posts'];
		}
		public function get_first_last_name() {
			$username = $this->user['username'];
			$query = mysqli_query($this->con, "SELECT firstname, lastname FROM users WHERE username = '$username'");
			$row = mysqli_fetch_array($query);
			return $row['firstname'] . " " . $row['lastname'];
		}
		public function is_friend($username) {
			$username_new = "," . $username . ",";
			if (strstr($this->user['followers_array'], $username_new) || $username == $this->user['username'])
				return true;
			else
				return false;
		}
		public function profile_pic() {
			$username = $this->user['username'];
			$query = mysqli_query($this->con, "SELECT profile_pic FROM users WHERE username = '$username'");
			$row = mysqli_fetch_array($query);
			return $row['profile_pic'];
		}
	}
?>