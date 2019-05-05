<?php
include ("header_files/header.php");
include ("User.php");
include ("Post.php");
include ('chat.php');
if(isset($_POST['post'])) {
	$post = new Post($con, $user_signin);
	$post->submit_post($_POST['new_text'],$_POST['from'],$_POST['destination'],$_POST['price'],$_POST['date'],$_POST['usr_time'], 'none');
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
			<table>
				<tr>
					<div class="fromTo" id="fromTo">
						<td>
								<div class="from" id="from">
									<h4>From : </h4>
									<select name="from" required>
										<option value="Chico">Chico</option>
										<option value="Sacramento">Sacramento</option>
										<option value="SF">San Francisco</option>
										<option value="LA">Los Angeles</option>
									</select>
							</div>
						</td>
						<td>
							<div class="destination" id="destination">
								<h4>Destination : </h4>
								<select name="destination" required>
									<option value="Chico">Chico</option>
									<option value="Sacramento" selected="selected">Sacramento</option>
									<option value="SF">San Francisco</option>
									<option value="LA">Los Angeles</option>
								</select>
							</div>
						</td>
					</div>
				</tr>
				<tr>
					<td>
						<br/>
						<h4>
							Date:
						</h4>
						 <input type="date" name="date" required>
						<script>
						var today = new Date().toISOString().split('T')[0];
						document.getElementsByName("date")[0].setAttribute('min', today);
						</script>
					</td>
					<td>
						<br/>
						<h4>
							Time :
						</h4>
						<input type="time" name="usr_time"  required>
						
					</td>
				</tr>
				<br/>
				<tr><td><h4>	Price :</h4><input type="number" name="price" min="0" required></td></tr>
			</table>
				<textarea name="new_text" id="new_text" placeholder="Any request or preference <?php echo $user['firstname'];?>?" required></textarea>
				<input type="submit" name="post" id="post_button" value="Post">
		</form>
		<?php
			$post = new Post($con, $user_signin);
			$post->show_post_followers();
		?>
	</div>
</body>
</html>
