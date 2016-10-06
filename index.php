<?php
include("admin/config.php");

if(!isset($_SESSION['user'])){
	
		header("location:login.php");

	}else{
	
		$user_id=$_SESSION['user']['id'];
	
	}
	
if(isset($_POST['travel'])){
	
		$sql3="delete from `travel` where `user_id`='$user_id'";
		mysqli_query($con,$sql3);
		$start_loc=$_POST['start_loc'];
		$end_loc=$_POST['end_loc'];
		$num_of_p=$_POST['num_of_p'];
		$today=date('H:i:s');
		$sql2="insert into `travel`(`user_id`,`start_loc`,`end_loc`,`num_of_p`) values ('$user_id','$start_loc','$end_loc','$num_of_p')";
		$res2=mysqli_query($con,$sql2);
		if($res2)
		{
			header("location:chat_users.php");
		}
		
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Sharewheels</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="travel" />
<!--<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
 //for-mobile-apps -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
 <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,400italic,300italic,600italic,700' rel='stylesheet' type='text/css'>
<script src='js/jquery.min.js'></script>
<!--<script>
 $('document').ready(function(){
  setInterval(function(){$('.note').load('ajax/note.php')},60000);
 });
</script>-->
</head>
<body>
	<div class="main">
		<div class="wthree_top_forms">
			<div class="agile-info_w3ls hvr-buzz-out">
				<h4><a href="chat_friend.php"><img src="images/chat-icon2.png" style="position:absolute;left:6%; top:3%;" class="img-responsive" alt="chat-icon" /><span class="badge note" style="position:absolute;top:1%;left:1%;border-radius:100%;height:25px;line-height:1.4;">
				<!--start-->
				<?php
		$id=$_SESSION['user']['id'];
	$sql="select * from message where (to_receiver='$id' and msg_view='0') and (`status`='0') order by id desc";
		
		$res=mysqli_query($con,$sql);
		echo mysqli_num_rows($res);
		
		while($message = mysqli_fetch_assoc($res))
		{
			$from_sender=$message['from_sender'];
			
			$sql2="select * from friend where user_id='$id'";
			$res2=mysqli_query($con,$sql2);
			$count2=mysqli_num_rows($res2);
			if($count2 > 0)
			{
				//while($friend = mysqli_fetch_assoc($res2)){
				//$frid = $friend['friend_id'];
				
				$sql2="select * from friend where `user_id`='$id' and `friend_id`='$from_sender'";
				$res2=mysqli_query($con,$sql2);
				$count2=mysqli_num_rows($res2);
					if( $count2 == 0 )
					{
						$sql3="insert into friend (user_id,friend_id) values ('$id','$from_sender')";
						mysqli_query($con,$sql3);
					}
				//}
				
			}
			else
			{
						$sql3="insert into friend (user_id,friend_id) values ('$id','$from_sender')";
						mysqli_query($con,$sql3);
				
			}
			
		}

				?>
				
				<!--end-->
				</span></a>Your Trip</h4>
				
				<div class="agile-info_w3ls_grid">
					<form action="" method="post">
						<div class="form-group">
						<label>From:</label>
						<select class="form-control" name='start_loc'>
						<?php
							$sql="select * from station";
							$res=mysqli_query($con,$sql);
							while($station=mysqli_fetch_assoc($res))
							{
						?>
							<option value="<?php echo $station['zip']; ?>"><?php echo $station['name']; ?></option>
						<?php
							}
						?>
						</select>
						 </div>
						 
						 <div class="form-group">
						<label>TO:</label>
						<input  type="text" name='end_loc' class="form-control" placeholder="Zip code" required=" ">
						</div>
						
						<div class="form-group">
						<label>With Number of persons</label>
						<input type="text" name="num_of_p" class="form-control" placeholder="Number of person" required=" ">
						</div>
						<div class="form-group">
						<input type="submit" name='travel' value="Go">
						</div>
					</form>
					<a href='chat_users.php' class='btn btn-info'>Back</a>
					<a href='trip_home.php' class='btn btn-info'>Close</a>
					
				</div>
			</div>
			
			<div class="clear"> </div>
		</div>
	</div>
</body>
</html>