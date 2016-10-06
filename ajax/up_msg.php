<?php
	include('../admin/config.php');
	if(isset($_SESSION['user']) && isset($_SESSION['friend']))
	{
		$id=$_SESSION['user']['id'];
		$friend_id=$_SESSION['friend'];
		$sql2="update message set msg_view='1' where from_sender='$friend_id' and to_receiver='$id' and msg_view='0'";
		if(mysqli_query($con,$sql2))
		{
			echo "query";
		}
		else
		{
			echo "no".mysqli_error($con);
		}
	}
	
?>
