<?php include("admin/config.php");?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Sharewheels</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Collective Forms Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,400italic,300italic,600italic,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="main">
		<div class="wthree_top_forms">
			<div class="agile-info_w3ls hvr-buzz-out">
				<h4>Your Trip</h4>
				<div class="agile-info_w3ls_grid">
				<h5 style="">THANKS FOR USING SHAREWHEELS</h5><br>
				<div class="row box">
					<?php 
					$query = "select * from advertise order by id desc limit 1";
					$run = mysqli_query($con,$query);
					while($advertise = mysqli_fetch_assoc($run)){
						
						if ($advertise['type']== 'text'){
							echo $advertise['adds'];
						}else{
							echo "<a href='http://{$advertise['link']}' target='_black'><img src='images/{$advertise['adds']}'/></a>";
						}
					}
					?>
				</div>
				<br />
				<div class="row box1">
				<span>CLOSING<br>Do you want to stop?<br> 
				<a href="chat_users.php" class="btn btn-info">GO BACK</a>
				<a href="logout.php" class="btn btn-info"> Logout </a>
				</span>
				</div>
				
				</div>
			</div>
			
			<div class="clear"> </div>
		</div>
	</div>
</body>
</html>