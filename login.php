<?php
include('admin/config.php');

$msg="";

if(isset($_POST['submit'])){
	
		$name=$_POST['name'];
		$password=$_POST['password'];
		$sql="select * from users where (name='$name' OR email='$name') and (password ='$password')";
		$res=mysqli_query($con,$sql);
		if(mysqli_num_rows($res)>0)
		{
			$row=mysqli_fetch_assoc($res);
			$_SESSION['user']=$row;
			$id=$_SESSION['user']['id'];
			$sql_live="update users set live='1' where id='$id'";
			mysqli_query($con,$sql_live);
			header('Location:index.php');
		}
		else
		{
			$msg="<div style='color:red;'>Invalid User name or password</div>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>sharewheels</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Travel" />

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,400italic,300italic,600italic,700' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="main">
		<div class="wthree_top_forms">
						<div class="agile-info_w3ls agile-info_w3ls_sub hvr-buzz-out">
				<h3>Login</h3>
				<div class="agile-info_w3ls_grid second">
					<form action="" method="post">
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="User Name OR Email" required=" ">
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Password" required=" ">
					</div>
					<?php
						echo $msg;
					?>
					<div class="agile_remember">
						<div class="clear"> </div>
					</div>
						<input name='submit' type="submit" value="Sign In">
					</form>
					<h5>Find us on </h5>
					<div class="social_icons agileinfo">
					   <section class="social">
						  <a href="https://www.facebook.com/Sharewheels-1238962246124416/" class="icon fb"><img src="images/f.png" alt=""/></a>
						  <a href="https://twitter.com/sharewheelsnu/" class="icon tw"><img src="images/t.png" alt=""/></a>
						  <a href="mailto:sharewheelsnu@gmail.com" class="icon gp"><img src="images/g.png" alt=""/></a>
						</section>
					</div>
					<h5>Don't have an account? <a href="registration.php">Sign Up</a></h5>
				</div>
			</div><!--login end-->

			
			<div class="clear"> </div>
		</div>
	</div>
</body>
</html>