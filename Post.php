<?php
	class Post {
		private $object_user;
		private $con;
		public function __construct($con, $user) {
			$this->con = $con;
			$this->object_user = new User($con, $user);
		}
		public function submit_post($body,$from,$destination,$price,$ridedate,$time, $user_to) {
			//echo $body;
			$body = strip_tags($body);
			$body = mysqli_real_escape_string($this->con, $body);
			$check_empty = preg_replace('/\s*/', '', $body);
			if ($check_empty != "") {
				$get_user = $this->object_user->get_user();
				if ($user_to == $get_user) {
					$user_to = "none";
				}
				$date = date("Y-m-d H:i:s");
				$query = mysqli_query($this->con, "INSERT INTO posts VALUES('', '$from','$destination','$price','$ridedate','$time','$body', '$get_user', '$user_to', '$date', 'no', 'no', '0')");
				$id = mysqli_insert_id($this->con);
				$num_posts = $this->object_user->get_num_posts();
				$num_posts++;
				$update_query = mysqli_query($this->con, "UPDATE users SET num_posts='$num_posts' WHERE username='$get_user'");
			}
		}
		public function show_post_followers() {
			$str = "";
			$user_n = $this->object_user->get_user();
			$data = mysqli_query($this->con, "SELECT * FROM posts WHERE deleted='no' ORDER BY id DESC");
			while ($row = mysqli_fetch_array($data)) {

				$id = $row['id'];
				$body = $row['body'];
				$from=$row['start'];
				$destination=$row['destination'];
				$price=$row['price'];
				$ridedate=$row['ridedate'];
				$time=$row['ridetime'];
				$date_time = $row['date'];
				$owner = $row['owner'];
				if ($row['reciever'] == "none") {
					$user_to = "";
				} else {
					$user_to_obj = new User($this->con, $row['reciever']);
					$user_to_name = $user_to_obj->get_first_last_name();
					$user_to = "<a href='" . $row['reciever'] . "'>" . $user_to_name . "</a>";
				}
				$added_by_obj = new User($this->con, $owner);
				if($added_by_obj->is_closed())
					continue;
				$user_obj = new User($this->con, $user_n);
				if (!$user_obj->is_friend($owner))
					continue;
				$user_detail = mysqli_query($this->con, "SELECT firstname, lastname, profile_pic FROM users WHERE username='$owner'");
				$user_row = mysqli_fetch_array($user_detail);
				$firstname = $user_row['firstname'];
				$lastname = $user_row['lastname'];
				$profile_pic = $user_row['profile_pic'];
				?>
				<script>
					function chat($username) {
						redirectTo('http://localhost:8080/RideShareBargain/chatting.php?name_of_user=<?php echo $owner;?>');
					}
					function toggle<?php echo $id;?>() {
						if (document.getElementById("toggleComment<?php echo $id;?>").style.display == "block")
							document.getElementById("toggleComment<?php echo $id;?>").style.display = "none";
						else
							document.getElementById("toggleComment<?php echo $id;?>").style.display = "block";
					}
				</script>
				<?php

				$str = $str . "<hr><div class='status_post' >
								<div class='post_profile_pic'>
									<img src='$profile_pic' width='50'>
								</div>
								<div class='posted_by' style='color:#ACACAC;'>
									<a href='$owner'> $firstname $lastname </a> $user_to &nbsp;&nbsp;&nbsp;&nbsp;$date_time
									&nbsp;&nbsp;&nbsp;&nbsp;
									<a id='chat' href='http://localhost:8080/RideShareBargain/chatting.php?name_of_user=$owner'>chat</a>
								</div>
								<div id='post_body'>
									$from ===> $destination : $ridedate at $time Price : $price$
									more information : $body
									<br>
								</div>
								<div class = 'com' onClick='javascript:toggle$id()'>
									<i class='fas fa-comment-dots' style='margin-right: 5px;'>comment</i>
								</div>
								<br>	
							</div>
							<div class='post_comment' id='toggleComment$id' style='display:none;'>
								<iframe src='comment.php?post_id=$id' id='comment' frameborder='0'></iframe>
							</div>
							";
			}
			echo $str;
		}

	}
?>
