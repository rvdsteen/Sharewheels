<?php
	include('admin/config.php');
				$id=$_SESSION['user']['id'];

	$sql_live="update users set live='0' where id='$id'";
	mysqli_query($con,$sql_live);
	session_destroy();
	header('Location:index.php');

?>