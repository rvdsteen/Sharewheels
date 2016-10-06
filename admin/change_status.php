<?php
	include('config.php');
	
	if(isset($_GET['status']))
	{
		$id=$_GET['status'];
		$sql="select * from users where id='$id'";
		$res=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($res);
		$status=$row['status'];
		if($status=='true')
		{
			$new_status='false';
		}
		if($status=='false')
		{
			$new_status='true';
		}
		$sql2="update users set status='$new_status' where id='$id'";
		if(mysqli_query($con,$sql2))
		{
			header('Location:user_view.php');
		}
		else{
			echo mysqli_error($con);
		}
	}
	else
	{
		header('Location:index.php');
	}
?>
