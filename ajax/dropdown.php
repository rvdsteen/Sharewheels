<?php
	include('../admin/config.php');
	if(isset($_POST['chat_user']))
	{
		$chat_user_id=$_POST['chat_user'];
		if($chat_user_id!=0)
		{
			$sql="select * from users where id='$chat_user_id'";
			$res=mysqli_query($con,$sql);
			$friend=mysqli_fetch_assoc($res);
			
			$_SESSION['friend']=$chat_user_id;
			?>
						<div class='row'>
								<div class="col-sm-6">							
									<span class='user_name' style='text-transform:capitalize;'><?php echo $friend['name']; ?></span>
									<div class="live pull-right"><i class='
									<?php
										if($friend['live']==1)
										{
											echo "glyphicon glyphicon-ok circle_tick";
										}
										else
										{
											echo "glyphicon glyphicon-remove circle_tick circle_tick2";
										}
									?>'></i></div>
								</div>
							<!--content is placed-->
						</div>
			<?php
		}
		else
		{
			unset($_SESSION['friend']);
		}
	}
	
?>
