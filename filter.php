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
	
	$from = "";
	$destination = "";
	
	$queryCondition1 = "";
	if(!empty($_POST["search"]["from"])) {
			$from = $_POST["search"]["from"];
			list($from) = explode("-",$_POST["search"]["from"]);
			$from1 = "$from";
		
		
		if(!empty($_POST["search"]["destination"])) {
			$destination = $_POST["search"]["destination"];
			list($destination) = explode("-",$_POST["search"]["destination"]);
			$destination1 = "$destination";
		}
		
		$queryCondition .= "WHERE destination like '$destination'";
	}
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
		<h2 align="center" class="Searh4Ride">Search for a Ride!</h2>
  <form name="frmSearch" method="post" action="">
	 <p align="center" class="search_input">
	
		
		<input type="text" placeholder="Search From Posted Date" id="from" name="search[from]"  value="<?php echo $from; ?>" class="input-control" />
	    <input type="text" placeholder="To Posted Date" id="destination" name="search[destination]" style="margin-left:10px"  value="<?php echo $destination; ?>" class="input-control"  />			 
		<input type="submit" name="go" value="Search" >
		
	
 
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
			<td><?php echo $row["from"]; ?></td>
			<td><?php echo $row["destination"]; ?></td>
			<td><?php echo $row["price"]; ?></td>
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

	
	<div>


</div>


</body>
</html>