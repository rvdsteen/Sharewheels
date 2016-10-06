<?php
	include('admin/config.php');
	if(!isset($_SESSION['user']))
	{
		header('Location:login.php');
	}
	$user_id=$_SESSION['user']['id'];
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Collective Forms Widget Flat Responsive Widget Template :: w3layouts</title>
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
				<h4>My Friends</h4>
				<div class="agile-info_w3ls_grid">
					<?php
						$sql="select * from friend where user_id='$user_id' order by id desc";
						$res=mysqli_query($con,$sql);
						while($friend=mysqli_fetch_assoc($res))
						{
							$friend_id=$friend['friend_id'];
							$sql2="select * from users where id='$friend_id'";
							$res2=mysqli_query($con,$sql2);
							$single_friend=mysqli_fetch_assoc($res2);
							echo "<a href='chat_friend.php?friend={$single_friend['id']}'><div style='color:#fff;background:#F34717;padding:7px 20px;border-radius:7px;text-transform:capitalize' class='pull-left'>{$single_friend['name']}</div></a>";
							
							
							$sql2="select * from message where from_sender='$friend_id' and to_receiver='$user_id' and msg_view='0' order by id desc";
							$res2=mysqli_query($con,$sql2);
							$count=mysqli_num_rows($res2);
							echo "<p style='border-color:#ccc;padding:10px;font-weight:bold;'>{$count}</p>";
							}
					?>
				</div>
			</div>
			
			<div class="clear"> </div>
		</div>
	</div>
</body>
</html>