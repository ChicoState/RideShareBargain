<?php
require 'configurations/config.php';

if (isset($_SESSION['username'])) {
	$user_signin = $_SESSION['username'];
	$user_detail_query = mysqli_query($con, "SELECT * FROM users WHERE username = '$user_signin';");
	$user = mysqli_fetch_array($user_detail_query);
} else {
	header("Location: signup.php");
}
?>
<?php
$target_dir = "styling/img/profile_pic/";
$uploadOk = 1;
if(isset($_POST["submit"])) {
    $imageFileType = end(explode('.', $_FILES["fileToUpload"]["name"]));
    $name = md5(rand()) . '.' . $imageFileType;
    $target_file = $target_dir . $name;
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 3000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
$query= "UPDATE `users` SET `profile_pic` =  '{$target_file}' WHERE `users`.`id` = {$user['id']}";
if(mysqli_query($con, $query))
{
  header("location:profile.php");
}
echo $query;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>
