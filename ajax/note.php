<?php
	include('../admin/config.php');
	if(isset($_SESSION['user']))
	{
		$id=$_SESSION['user']['id'];
		$sql="select * from message where `to_receiver`='$id' and msg_view='0' order by id desc";
		$res=mysqli_query($con,$sql);
		mysqli_num_rows($res);
		while($message=mysqli_fetch_assoc($res))
		{
			$from_sender=$message['from_sender'];
			$sql2="select * from `friend` where `user_id`='$id'";
			$res2=mysqli_query($con,$sql2);
			$count2=mysqli_num_rows($res2);
			if($count2 > 0)
			{
					$friend=mysqli_fetch_assoc($res2);
				
				if($friend['friend_id']!=$from_sender){
						//$sql3="insert into friend (user_id,friend_id) values ('$id','$from_sender')";
						//mysqli_query($con,$sql3);
				}
				
				
			}else{		
			
			}
			
		}
	}	
?>
