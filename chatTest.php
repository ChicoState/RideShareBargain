<?php

use PHPUnit\Framework\TestCase;
require 'C:\xampp\htdocs\RideShareBargain\User.php';
require 'C:\xampp\htdocs\RideShareBargain\Chat.php';

class testChat extends TestCase {
	public function testChatSender() {
		$con = mysqli_connect("localhost", "root", "", "rsb");
		// $pass = md5("smitsmit");
		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', 'Smit', 'Guddu', 'xxx', 'smitguddu@gmail.com', '$pass', '2019-04-07', 'styling/img/profile_pic/default_pics/default.png', '0', 'no', '0', '0', ',');");
		$posts = new Chat($con, 'smitkumar_contractor');
		$str = $posts->get_chat("guddu_conti");
		$this->assertStringContainsString("smitkumar_contractor", $str);
	}
  public function testChatReciever() {
		$con = mysqli_connect("localhost", "root", "", "rsb");
		// $pass = md5("smitsmit");
		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', 'Smit', 'Guddu', 'xxx', 'smitguddu@gmail.com', '$pass', '2019-04-07', 'styling/img/profile_pic/default_pics/default.png', '0', 'no', '0', '0', ',');");
		$posts = new Chat($con, 'smitkumar_contractor');
		$str = $posts->get_chat("guddu_conti");
		$this->assertStringContainsString("guddu_conti", $str);
	}
  public function testChatMessageOwner() {
		$con = mysqli_connect("localhost", "root", "", "rsb");
		// $pass = md5("smitsmit");
		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', 'Smit', 'Guddu', 'xxx', 'smitguddu@gmail.com', '$pass', '2019-04-07', 'styling/img/profile_pic/default_pics/default.png', '0', 'no', '0', '0', ',');");
		$posts = new Chat($con, 'smitkumar_contractor');
		$str = $posts->get_chat("guddu_conti");
		$this->assertStringContainsString("hello", $str);
	}
  public function testChatMessageReciever() {
		$con = mysqli_connect("localhost", "root", "", "rsb");
		// $pass = md5("smitsmit");
		//$query = mysqli_query($con, "INSERT INTO users VALUES ('', 'Smit', 'Guddu', 'xxx', 'smitguddu@gmail.com', '$pass', '2019-04-07', 'styling/img/profile_pic/default_pics/default.png', '0', 'no', '0', '0', ',');");
		$posts = new Chat($con, 'smitkumar_contractor');
		$str = $posts->get_chat("guddu_conti");
		$this->assertStringContainsString("do you need ride?", $str);
	}
}

?>
