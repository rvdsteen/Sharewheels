<?php
	include('../admin/config.php');
	if(isset($_SESSION['user']) && isset($_SESSION['friend']))
	{
		$id=$_SESSION['user']['id'];
		$friend_id=$_SESSION['friend'];
		$sql="select * from `users` where `id`='$friend_id'";
		$res=mysqli_query($con,$sql);
		$friend=mysqli_fetch_assoc($res);
?>
		<i class='
		<?php
			if($friend['live']==1)
			{
				echo "glyphicon glyphicon-ok circle_tick";
			}
			else
			{
				echo "glyphicon glyphicon-remove circle_tick circle_tick2";
			}
		?>'>
		</i>

<?php
	}
	
?>
