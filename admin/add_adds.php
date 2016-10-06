<?php
	include('config.php');
	// print_r($_POST);
	if(isset($_POST['advertise']))
	{
		$status='false';
		$add_type=$_POST['add_type'];		
		if($add_type=='pic' && $_FILES['photo']['name']!='')
		{
			$link=$_POST['link'];
			$photo=$_FILES['photo'];
			$name=$photo['name'];	
			$tmp_name=$photo['tmp_name'];
			$path="../images/".$name;
			move_uploaded_file($tmp_name,$path);
			$type="pic";
			$sql="insert into advertise (adds,status,type,link) values('$name','$status','$type','$link')";
			if(mysqli_query($con,$sql))
			{
				 header('Location:advertise.php');
			}
			else{
				echo mysqli_error($con);
			}

			
		}
		elseif($add_type=='text' && $_POST['advertise']!='')
		{
			$add=$_POST['advertise'];
			$type="text";
			$sql="insert into advertise (adds,status,type) values('$add','$status','$type')";
			if(mysqli_query($con,$sql))
			{
				header('Location:advertise.php');
			}
			else{
				echo mysqli_error($con);
			}
			
		}
		else
		{
			header('Location:advertise.php');
		}
	}
	else
	{
		header('Location:index.php');
	}
?>
