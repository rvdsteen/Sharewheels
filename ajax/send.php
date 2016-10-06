<?php
	include('../admin/config.php');
	if(!isset($_SESSION['friend']))
	{
		echo "no";
	}
	else
	{
		if(isset($_POST['chat_msg']))
		{
			$msg = $_POST['chat_msg'];
			$id  = $_SESSION['user']['id'];
			$friend_id = $_SESSION['friend'];
			
			$sql="insert into `message` (`from_sender`,`to_receiver`,`msg`) values ('$id','$friend_id','$msg')";
			$res=mysqli_query($con,$sql);
			
			echo $sql2 = "select * from `friend` where (`user_id`='$id' and `friend_id`='$friend_id')";
		   	$res2 = mysqli_query($con,$sql2);
		   	
		   if( mysqli_num_rows($res2) == '0' )
		   	{
			$sql="insert into `friend` (`user_id`,`friend_id`) values ('$id','$friend_id')";
			mysqli_query($con,$sql);
   			}
		}
	}
	
?>
