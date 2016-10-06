<?php
	include('../admin/config.php');
	if(isset($_SESSION['user']))
	{
		$id=$_SESSION['user']['id'];
		$friend_id=$_SESSION['friend'];
		$sql="select * from message where from_sender='$id' and to_receiver='$friend_id' OR from_sender='$friend_id' and to_receiver='$id' order by id desc";
		$res=mysqli_query($con,$sql);
		$count = 0;
		while($msg=mysqli_fetch_assoc($res))
		{
			if($msg['from_sender']==$id)
			{
				$date=date("M j, Y, g:i a",strtotime($msg['time']));
				echo "<div class='chat_message_wrapper chat_message_right'>
                                
                                <ul class='chat_message' >
                                    <li>
                                        <p style='color:#000;'>
                                           Me: {$msg['msg']}
                                        </p>
										 
										 <span style='font-size:10px;color:#3C763D;'>{$date}<br />";
									if($msg['msg_view']==1)
								{
								 if($count==0)
								 {
								  echo "seen"; 
								 }
								 $count=1;
								}
									echo "<span>
                                    </li>
                                </ul>
                            </div>";
							 
				// "<p style='background:#6A6853;text-align:left;border:1px solid #6A6853;border-radius:5px;transition:0.5 all;width:150px;padding:7px;'>Me: </p>";
			}
			else
			{
				$sql2="select * from users where id='$friend_id'";
				$res2=mysqli_query($con,$sql2);
				$friend=mysqli_fetch_assoc($res2);
				$date=date("M j, Y, g:i a",strtotime($msg['time']));
				echo "<div class='chat_message_wrapper'>
						<ul class='chat_message'>
                                    <li>
                                        <p style='color:#000;'><span style='text-transfrom:capitalize;'> {$friend['name']}: </span>{$msg['msg']}</p>
										 <span style='font-size:10px;color:#3C763D;'>{$date}<span>
                                    </li>
                                   
                                </ul>
					</div>";
				// "<p style='background:#3B4640;text-align:right;border:1px solid #3B4640;border-radius:5px;transition:0.5 all;width:150px;padding:7px;'></p>";
			}
		}
	}
	
?>
