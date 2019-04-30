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

<html>
<head>
	<title>RideShareBargain</title>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script type="styling/javascript/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="styling/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="styling/css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>
	<div class="top_nav_bar">
		<div class="logo">
			<!-- <b><a href="index.php">RSB</a></b> -->
			<a href="index.php"><img class="image" src="styling/img/rsb.png"></a>
		</div>
		<nav>
			<a href="<?php echo $user_signin;?>">
				<?php
					echo $user['firstname'];
				?>
			</a>
			<a href="index.php"><i class="fas fa-home"></i></a>
			<a href="#"><i class="fas fa-bell"></i></a>
			<a href="#"><i class="fas fa-envelope"></i></a>
			<a href="filter.php"><i class="fas fa-car-alt"></i></a>
			<a href="#"><i id="settings" class="fas fa-cog"></i></a>
			<a href="signout.php"><i class="fas fa-sign-out-alt"></i></a>
		</nav>
	</div>
	

<?php
	$conn = mysqli_connect("localhost", "root", "", "rsb");
	
	$start = "";
	$destination = "";
	$post_at_to_date = "";
	$queryCondition1 = "";
		$post_at_todate = date('Y-m-d');
		if(!empty($_POST["search"]["post_at_to_date"])) {
			$post_at_to_date = $_POST["search"]["post_at_to_date"];
			list($tid,$tim,$tiy) = explode("-",$_POST["search"]["post_at_to_date"]);
			$post_at_todate = "$tiy-$tim-$tid";
		}			

	
		if(!empty($_POST["search"]["start"])) {
			$start = $_POST["search"]["start"];
			list($start) = explode("-",$_POST["search"]["start"]);
			$start1 = "$start";
		}

		if(!empty($_POST["search"]["destination"])) {
			$destination = $_POST["search"]["destination"];
			list($destination) = explode("-",$_POST["search"]["destination"]);
			$destination1 = "$destination";
		}
		
		$queryCondition .= "WHERE start like '$start' AND destination like '$destination' AND ridedate like '$post_at_todate'";
	
	if($_POST)
	{
	$sql = "SELECT * from posts " . $queryCondition . " ORDER BY ridedate asc";
	$result2 = mysqli_query($conn,$sql);
	}
?>


<html>
	<head>
    <title>Search for a Ride!</title>		
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	<style>
	.table-content{border-top:#CCCCCC 4px solid; width:100%;}
	.table-content th {padding:5px 20px; background: #F0F0F0;vertical-align:top;} 
	.table-content td {padding:10px 25px; border-bottom: #F0F0F0 1px solid;vertical-align:top;} 
	input[type=text], select {
  width:20%;
  padding: 10px 30px;
  margin: 10px 2;
  
  border-radius: 15px;
  box-sizing: border-box;
  .destination{center
  
}
	</style>
	</head>
	
	<body>
	
	
    <div class="filter-ride">
	<br>
	<br><br>
		</div>
		<h2 align="center" class="Searh4Ride">Search for a Ride!</h2>
		<h4 align="center">Select desired leaving date, starting location, and destination to being your search!</h4>
  <form name="frmSearch" method="post" action="">
	 <p align="center" class="search_input">
	
	    <input type="text" placeholder="To Date" id="post_at_to_date" name="search[post_at_to_date]" style="margin-left:10px"  value="<?php echo $post_at_to_date; ?>" class="input-control"  /><input type="text" placeholder="Search from starting location" id="start" name="search[start]" style="margin-left:10px"  value="<?php echo $start; ?>" class="input-control"  />	
	    <input type="text" placeholder="To Destination" id="destination" name="search[destination]" style="margin-left:10px"  value="<?php echo $destination; ?>" class="input-control"  />		 
<button class="bttn-jelly bttn-md bttn-danger" type="submit" name="go">Search</button>
<style>
/* Found this style for button online at https://bttn.surge.sh/ 
* RSB takes no credit for the style for this search button. 
*/
charset "UTF-8";
/*!
 *	
 * bttn.css - https://ganapativs.github.io/bttn.css
 * Version - 0.2.4
 * Demo: https://bttn.surge.sh
 *
 * Licensed under the MIT license - http://opensource.org/licenses/MIT
 *
 * Copyright (c) 2016 Ganapati V S (@ganapativs)
 *
 */
/* standalone - .bttn-jelly */
.bttn-default {
  color: #ff0000;
}

.bttn-md
{
  color: #1d89ff;
}

.bttn-danger {
  color: #ff0000;
}

.bttn-md
{
  margin: 0;
  padding: 0;
  border-width: 0;
  border-color: transparent;
  background: transparent;
  font-weight: 400;
  cursor: pointer;
  position: relative;


.bttn-md {
  font-size: 20px;
  font-family: inherit;
  padding: 5px 12px;
}

}
.bttn-jelly {
  margin: 0;
  padding: 0;
  border-width: 0;
  border-color: transparent;
  background: transparent;
  font-weight: 400;
  cursor: pointer;
  position: relative;
  font-size: 20px;
  font-family: inherit;
  padding: 5px 12px;
  overflow: hidden;
  border-radius: 50px;
  background: #fff;
  color: #1d89ff;
  -webkit-transition: all 0.2s cubic-bezier(0.02, 0.01, 0.47, 1);
  transition: all 0.2s cubic-bezier(0.02, 0.01, 0.47, 1);
}
.bttn-jelly:before {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 50px;
  background: currentColor;
  content: '';
  z-index: -1;
  opacity: 0;
  -webkit-transition: all 0.2s cubic-bezier(0.02, 0.01, 0.47, 1);
  transition: all 0.2s cubic-bezier(0.02, 0.01, 0.47, 1);
  -webkit-transform: scale(0.2);
          transform: scale(0.2);
}
.bttn-jelly:hover,
.bttn-jelly:focus {
  box-shadow: 0 1px 8px rgba(58,51,53,0.4);
  -webkit-transition: all 0.3s cubic-bezier(0.02, 0.01, 0.47, 1);
  transition: all 0.3s cubic-bezier(0.02, 0.01, 0.47, 1);
  -webkit-transform: scale(1.1);
          transform: scale(1.1);
}
.bttn-jelly:hover:before,
.bttn-jelly:focus:before {
  opacity: 0.15;
  -webkit-transition: all 0.3s cubic-bezier(0.02, 0.01, 0.47, 1);
  transition: all 0.3s cubic-bezier(0.02, 0.01, 0.47, 1);
  -webkit-transform: scale(1);
          transform: scale(1);
}

.bttn-jelly.bttn-md {
  font-size: 20px;
  font-family: inherit;
  padding: 5px 12px;
}
.bttn-jelly.bttn-md:hover,
.bttn-jelly.bttn-md:focus {
  box-shadow: 0 1px 8px rgba(58,51,53,0.4);
}


.bttn-jelly.bttn-danger {
  background: #ff0000;
  color: #fff;
}
</style>

		
	
 
<?php if(!empty($result2))	 { ?>
<table class="table-content">
          <thead>
        <tr>
                      
          <th width="8%"><span>Driver Name</span></th>
          <th width="9%"><span>Starting Location</span></th>          
          <th width="10%"><span>Destination</span></th>
          <th width="5%"><span>Price</span></th>
          <th width="10%"><span>Planned leaving day</span></th>          
          <th width="10%"><span>Planned leaving time</span></th>	
          <th width="10%"><span>Driver Preferences</span></th>
          <th width="10%"><span>Date Ride Posted</span></th>	
          <th width="15%"><span>Drivers Profile</span></th>			  
		  
        </tr>
      </thead>
    <tbody>
	<?php
		while($row = mysqli_fetch_array($result2)) {
	?>
        <tr>
			
			<td><?php echo $row["owner"]; ?></td>
			<td><?php echo $row["start"]; ?></td>
			<td><?php echo $row["destination"]; ?></td>
			<td><?php echo "$", $row["price"]; ?></td>
			<td><?php echo $row["ridedate"]; ?></td>
			<td><?php echo $row["ridetime"]; ?></td>
			<td><?php echo $row["body"]; ?></td>
			<td><?php echo $row["date"]; ?></td>
             <td><a href="<?php echo $row['owner'];?>">Click Here to Bargain!</a></td>



			

		</tr>
   <?php
		}
   ?>
   <tbody>
  </table>
<?php } ?>
  </form>
  </div>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
$.datepicker.setDefaults({
showOn: "button",
buttonImage: "datepicker.png",
buttonText: "Date Picker",
buttonImageOnly: true,
dateFormat: 'dd-mm-yy'  
});
$(function() {
$("#post_at").datepicker();
$("#post_at_to_date").datepicker();
});
</script>
	
	<div>


</div>


</body>
</html>