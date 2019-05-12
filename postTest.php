<?php

use PHPUnit\Framework\TestCase;
require 'C:\xampp\htdocs\RideShareBargain\User.php';
require 'C:\xampp\htdocs\RideShareBargain\Post.php';

class testPost extends TestCase {
	public function testPostOwner() {
		$con = mysqli_connect("localhost", "root", "", "rsb");
		// $pass = md5("smitsmit");
		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', 'Smit', 'Guddu', 'xxx', 'smitguddu@gmail.com', '$pass', '2019-04-07', 'styling/img/profile_pic/default_pics/default.png', '0', 'no', '0', '0', ',');");
		$posts = new Post($con, 'smitkumar_contractor');
		$str = $posts->show_post_followers();
		$this->assertStringContainsString("smitkumar_contractor", $str);
	}
	public function testPostRider() {
		$con = mysqli_connect("localhost", "root", "", "rsb");
		// $pass = md5("smitsmit");
		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', 'Smit', 'Guddu', 'xxx', 'smitguddu@gmail.com', '$pass', '2019-04-07', 'styling/img/profile_pic/default_pics/default.png', '0', 'no', '0', '0', ',');");
		$posts = new Post($con, 'smitkumar_contractor');
		$str = $posts->show_post_followers();
		$this->assertStringContainsString("guddu_conti", $str);
	}
	public function testPostSmitkumarPreferences() {
		$con = mysqli_connect("localhost", "root", "", "rsb");
		// $pass = md5("smitsmit");
		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', 'Smit', 'Guddu', 'xxx', 'smitguddu@gmail.com', '$pass', '2019-04-07', 'styling/img/profile_pic/default_pics/default.png', '0', 'no', '0', '0', ',');");
		$posts = new Post($con, 'smitkumar_contractor');
		$str = $posts->show_post_followers();
		$this->assertStringContainsString("No snakes.", $str);
	}
	public function testPostSmitkumarRideTime() {
		$con = mysqli_connect("localhost", "root", "", "rsb");
		// $pass = md5("smitsmit");
		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', 'Smit', 'Guddu', 'xxx', 'smitguddu@gmail.com', '$pass', '2019-04-07', 'styling/img/profile_pic/default_pics/default.png', '0', 'no', '0', '0', ',');");
		$posts = new Post($con, 'smitkumar_contractor');
		$str = $posts->show_post_followers();
		$this->assertStringContainsString("02:01:00", $str);
	}
	public function testPostSmitkumarDate() {
		$con = mysqli_connect("localhost", "root", "", "rsb");
		// $pass = md5("smitsmit");
		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', 'Smit', 'Guddu', 'xxx', 'smitguddu@gmail.com', '$pass', '2019-04-07', 'styling/img/profile_pic/default_pics/default.png', '0', 'no', '0', '0', ',');");
		$posts = new Post($con, 'smitkumar_contractor');
		$str = $posts->show_post_followers();
		$this->assertStringContainsString("2019-05-11 12:00:05", $str);
	}
	public function testPostSmitkumarPrice() {
		$con = mysqli_connect("localhost", "root", "", "rsb");
		// $pass = md5("smitsmit");
		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', 'Smit', 'Guddu', 'xxx', 'smitguddu@gmail.com', '$pass', '2019-04-07', 'styling/img/profile_pic/default_pics/default.png', '0', 'no', '0', '0', ',');");
		$posts = new Post($con, 'smitkumar_contractor');
		$str = $posts->show_post_followers();
		$this->assertStringContainsString("120", $str);
	}
	public function testPostSacramento() {
		$con = mysqli_connect("localhost", "root", "", "rsb");
		// $pass = md5("smitsmit");
		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', 'Smit', 'Guddu', 'xxx', 'smitguddu@gmail.com', '$pass', '2019-04-07', 'styling/img/profile_pic/default_pics/default.png', '0', 'no', '0', '0', ',');");
		$posts = new Post($con, 'smitkumar_contractor');
		$str = $posts->show_post_followers();
		$this->assertStringContainsString("Sacramento", $str);
	}
	public function testPostSF() {
		$con = mysqli_connect("localhost", "root", "", "rsb");
		// $pass = md5("smitsmit");
		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', 'Smit', 'Guddu', 'xxx', 'smitguddu@gmail.com', '$pass', '2019-04-07', 'styling/img/profile_pic/default_pics/default.png', '0', 'no', '0', '0', ',');");
		$posts = new Post($con, 'smitkumar_contractor');
		$str = $posts->show_post_followers();
		$this->assertStringContainsString("SF", $str);
	}
	public function testPostChico() {
		$con = mysqli_connect("localhost", "root", "", "rsb");
		// $pass = md5("smitsmit");
		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', 'Smit', 'Guddu', 'xxx', 'smitguddu@gmail.com', '$pass', '2019-04-07', 'styling/img/profile_pic/default_pics/default.png', '0', 'no', '0', '0', ',');");
		$posts = new Post($con, 'smitkumar_contractor');
		$str = $posts->show_post_followers();
		$this->assertStringContainsString("Chico", $str);
	}
	public function testPostId() {
		$con = mysqli_connect("localhost", "root", "", "rsb");
		// $pass = md5("smitsmit");
		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', 'Smit', 'Guddu', 'xxx', 'smitguddu@gmail.com', '$pass', '2019-04-07', 'styling/img/profile_pic/default_pics/default.png', '0', 'no', '0', '0', ',');");
		$posts = new Post($con, 'smitkumar_contractor');
		$str = $posts->show_post_followers();
		$this->assertStringContainsString("16", $str);
	}
	public function testPostThis() {
		$con = mysqli_connect("localhost", "root", "", "rsb");
		// $pass = md5("smitsmit");
		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', 'Smit', 'Guddu', 'xxx', 'smitguddu@gmail.com', '$pass', '2019-04-07', 'styling/img/profile_pic/default_pics/default.png', '0', 'no', '0', '0', ',');");
		$posts = new Post($con, 'smitkumar_contractor');
		$str = $posts->show_post_followers();
		$this->assertStringContainsString("", $str);
	}
}

?>
