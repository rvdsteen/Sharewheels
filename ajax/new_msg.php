<?php
	include('../admin/config.php');
	if(isset($_SESSION['user']) && isset($_SESSION['friend']))
	{
		$id=$_SESSION['user']['id'];
		$friend_id=$_SESSION['friend'];
		$sql2="select * from `message` where (`from_sender`='$friend_id' and `to_receiver`='$id') and `msg_view`='0' order by id desc";
		$res2=mysqli_query($con,$sql2);
		$count=mysqli_num_rows($res2);
		echo $count;
	}
	
?>
