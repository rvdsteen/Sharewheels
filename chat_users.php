<?php
include('admin/config.php');
if(!isset($_SESSION['user']))
{
	header('Location:index.php');
}
$user_id=$_SESSION['user']['id'];
?>


<!DOCTYPE html>
<html>
<head>
<title>Sharewheels</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Collective Forms Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!--<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
 //for-mobile-apps -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,400italic,300italic,600italic,700' rel='stylesheet' type='text/css'>
<script src='js/jquery.min.js'></script>
<script>
	$('document').ready(function(){
		$('#travel_user').change(function(){
			var travel=$('#travel_user').val();
			
			$.ajax({  
				type: "POST",  
				url: "ajax/dropdown.php",
 				data: {chat_user:travel},
				success: function(data) {  
					  $('.dropdown_res').html(data);
				}
			});				

		});
		$('#form3').submit(function(e){
			var msg=$('#msg').val();
			var data = 'chat_msg='+ msg;				
			$.ajax({  
				type: "POST",  
				url: "ajax/send.php",
 				data: data,
				success: function(data) {
					if(data=='no')
					{
						alert('Please select one');
					}
					else
					{
						 // alert(data);
						$('.chat_box').load('ajax/messages.php');
					  // $('.dropdown_res').html(data);
					}
					$('#msg').val('');
				}
			});		
			e.preventDefault();
		});//form end
		$('.chat_box').click(
			 function()
			 {
			  $.ajax({  
			   type: "POST",  
			   url: "ajax/up_msg.php",
			   success: function(data) {
				// alert(data);
			   }
      });
      
     }
     );
	setInterval(function(){
	var travel=$('#travel_user').val();
	if(travel != 0){
	$('.chat_box').load('ajax/messages.php');
	$('.msg_alert').load('ajax/new_msg.php');
	$('.live').load('ajax/live.php');
	}else{
		$('.chat_box').html("");
	}
	},3000);//end of interval
//				
					
	});
</script>
</head>
<body>
	<div class="main">
		<div class="wthree_top_forms">
			<div class="agile-info_w3ls hvr-buzz-out">
			
				<h4>My Matches<img src="images/chat-icon2.png" class="img-responsive" alt="chat-icon" /><span class="badge msg_alert num-msg" style="position:absolute;top:1%;left:1%;border-radius:100%;height:25px;line-height:1.4;"> </span></h4>
				
				<div class="agile-info_w3ls_grid">
					<form action="#" method="post" id='form2'>
						<select id='travel_user'>
						<option value='0'>Found Travellers</option>
						<?php
							$sql="select * from `travel` where `user_id`='$user_id' order by id desc";
							$res=mysqli_query($con,$sql);
							$user=mysqli_fetch_assoc($res);
							$start_loc=$user['start_loc'];
							$end_loc=$user['end_loc'];
							$end_loc=substr($end_loc,0,3);
							$num_of_p=$user['num_of_p'];
							$date=$user['date'];
							
							$sql2="select * from `travel` where (`start_loc` = '$start_loc' and `end_loc` like '$end_loc%') and (`user_id` != '$user_id' and `date` >= NOW() - INTERVAL 4 HOUR)";
							$res2=mysqli_query($con,$sql2);
							while($find_user=mysqli_fetch_assoc($res2))
							{
								$f_u_id=$find_user['user_id'];
								$sql3="select * from users where id='$f_u_id'";
								$res4=mysqli_query($con,$sql3);
								$f_user=mysqli_fetch_assoc($res4);
								$f_name=$f_user[''];
								echo "<option value='{$f_user['id']}' style='text-transform:capitalize;'>{$f_user['name']}</option>";
							}
						?>
						</select>
					</form>
					<div class='dropdown_res'>
						
					</div>
					<div class='chat_box'>
					
					</div>
					<form id='form3'>
						<input type='text' class='form-control msgbox' id='msg' placeholder='Enter Message'/>
						<button type="submit" class='btn btn-info cl-btn'>Send</button>
					</form>

					<a href='index.php' class='btn btn-info'>Back</a>
					<a href='trip_home.php' class='btn btn-info'>Close</a>

				</div>
			</div>
			
			<div class="clear"> </div>
		</div>
	</div>
</body>
</html>