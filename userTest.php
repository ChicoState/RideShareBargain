<?php

use PHPUnit\Framework\TestCase;
require 'C:\xampp\htdocs\RideShareBargain\User.php';

class testUser extends TestCase {
	public function testUserName() {
		$con = mysqli_connect("localhost", "root", "", "rsb");
		$pass = md5("smitsmit");
		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', 'Smit', 'Guddu', 'xxx', 'smitguddu@gmail.com', '$pass', '2019-04-07', 'styling/img/profile_pic/default_pics/default.png', '0', 'no', '0', '0', ',');");
		$user = new User($con, 'smitkumar_contractor');
		$this->assertEquals("smitkumar_contractor", $user->get_user());
	}
	public function testNumberOfPosts() {
		$con = mysqli_connect("localhost", "root", "", "rsb");
		$pass = md5("smitsmit");
		//require 'C:\xampp\htdocs\RideShareBargain\User.php';
		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', 'Smit', 'Guddu', 'xxx', 'smitguddu@gmail.com', '$pass', '2019-04-07', 'styling/img/profile_pic/default_pics/default.png', '0', 'no', '0', '0', ',');");
		$user = new User($con, 'smitkumar_contractor');
		$this->assertEquals(2, $user->get_num_posts());
	}
	public function testIsUserClosedNo() {
		$con = mysqli_connect("localhost", "root", "", "rsb");
		$pass = md5("smitsmit");
		//require 'C:\xampp\htdocs\RideShareBargain\User.php';
		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', 'Smit', 'Guddu', 'xxx', 'smitguddu@gmail.com', '$pass', '2019-04-07', 'styling/img/profile_pic/default_pics/default.png', '0', 'no', '0', '0', ',');");
		$user = new User($con, 'smitkumar_contractor');
		$this->assertEquals(false, $user->is_closed());
	}
	public function testIsUserClosedYes() {
		$con = mysqli_connect("localhost", "root", "", "rsb");
		$pass = md5("smitsmit");
		//require 'C:\xampp\htdocs\RideShareBargain\User.php';
		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', 'Smit', 'Guddu', 'xxx', 'smitguddu@gmail.com', '$pass', '2019-04-07', 'styling/img/profile_pic/default_pics/default.png', '0', 'no', '0', '0', ',');");
		$user = new User($con, 'lalu_ji');
		$this->assertEquals(true, $user->is_closed());
	}
	public function testIsFriendYes() {
		$con = mysqli_connect("localhost", "root", "", "rsb");
		$pass = md5("smitsmit");
		//require 'C:\xampp\htdocs\RideShareBargain\User.php';
		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', 'Smit', 'Guddu', 'xxx', 'smitguddu@gmail.com', '$pass', '2019-04-07', 'styling/img/profile_pic/default_pics/default.png', '0', 'no', '0', '0', ',');");
		$user = new User($con, 'smitkumar_contractor');
		$this->assertEquals(true, $user->is_friend("guddu_conti"));
	}
	public function testIsFriendNo() {
		$con = mysqli_connect("localhost", "root", "", "rsb");
		$pass = md5("smitsmit");
		//require 'C:\xampp\htdocs\RideShareBargain\User.php';
		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', 'Smit', 'Guddu', 'xxx', 'smitguddu@gmail.com', '$pass', '2019-04-07', 'styling/img/profile_pic/default_pics/default.png', '0', 'no', '0', '0', ',');");
		$user = new User($con, 'smitkumar_contractor');
		$this->assertEquals(false, $user->is_friend("lalu_ji"));
	}
	public function testGetFirstLastName() {
		$con = mysqli_connect("localhost", "root", "", "rsb");
		$pass = md5("smitsmit");
		//require 'C:\xampp\htdocs\RideShareBargain\User.php';
		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', 'Smit', 'Guddu', 'xxx', 'smitguddu@gmail.com', '$pass', '2019-04-07', 'styling/img/profile_pic/default_pics/default.png', '0', 'no', '0', '0', ',');");
		$user = new User($con, 'smitkumar_contractor');
		$this->assertEquals("Smitkumar Contractor", $user->get_first_last_name());
	}
}

?>