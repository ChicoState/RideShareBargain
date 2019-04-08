<?php
	class Chat {
		private $object_user;
		private $con;
		public function __construct($con, $user) {
			$this->con = $con;
			$this->object_user = new User($con, $user);
		}
		public function send_chat($user_recv, $body, $date) {
			if($body != "") {
				$user_in = $this->object_user->get_user();
				$query = mysqli_query($this->con, "INSERT INTO chat VALUES('', '$user_in', '$user_recv', '$body', '$date')");
			}

		}
		public function get_chat($user_recv) {
			$user_send = $this->object_user->get_user();
			$data = "";

			$get_messages_query = mysqli_query($this->con, "SELECT * FROM chat WHERE (user_recv='$user_send' AND user_send='$user_recv') OR (user_send='$user_send' AND user_recv='$user_recv') ORDER BY id DESC");

			while($row = mysqli_fetch_array($get_messages_query)) {
				$user_recv = $row['user_recv'];
				$user_send = $row['user_send'];
				$body = $row['body'];
				$data = $data . "<a href='$user_send'>" . $user_send . "</a>" . "<br><br>";
				$data = $data . $body . "<hr><br><br>";
			}
			return $data;
		}
		public function get_recent_user() {
			$user_in = $this->object_user->get_user();
			$query = mysqli_query($this->con, "SELECT user_send, user_recv FROM chat WHERE user_recv='$user_in' OR user_send = '$user_in' ORDER BY id DESC LIMIT 1");
			if (mysqli_num_rows($query) == 0)
				return false;
			$row = mysqli_fetch_array($query);
			$user_recv = $row['user_recv'];
			$user_send = $row['user_send'];
			if ($user_recv != $user_in)
				return $user_recv;
			else
				return $user_send;
		}

	}
?>