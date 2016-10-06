<?php
include('admin/config.php');
if(!isset($_SESSION['user']))
{
	header('Location:index.php');
}
echo $user_id=$_SESSION['user']['id'];
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
			
			$.ajax({  
			   type: "POST",  
			   url: "ajax/up_msg.php",
			   success: function(data) {
				// alert(data);
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
						 
						$('.chat_box').load('ajax/messages.php');
					  
					}
					$('#msg').val('');
				}
			});		
			e.preventDefault();
		});//form end
		$('.chat_box').click(function(){
			$.ajax({  
			   type: "POST",  
			   url: "ajax/up_msg.php",
			   success: function(data) {
				// alert(data);
			   }
			});
      
		});
	 
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
      //updation
       $sql="select * from `friend` where `user_id`='$user_id' order by id desc";
       $res=mysqli_query($con,$sql);
       while($friend=mysqli_fetch_assoc($res))
       {
        $friend_id = $friend['friend_id'];
        
        //********
        // friend record
        //********
        
        $sql2="select * from `users` where id='$friend_id'";
        $res2=mysqli_query($con,$sql2);
        $friend_record=mysqli_fetch_assoc($res2);

        //********
        // friend messages
        //********
        
        $sql3="select * from message where (`from_sender`='$friend_id' and `to_receiver`='$user_id') and `msg_view`='0'";
        $res3=mysqli_query($con,$sql3);
        $count=mysqli_num_rows($res3);
        
        
        
        echo "<option value='{$friend_record['id']}'>{$friend_record['name']} ({$count})</option>";        
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