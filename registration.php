<?php
include("admin/config.php");
$msg = '';
if(isset($_POST["submit"])){
	$name = $_POST["name"];
	$email = $_POST["email"];
	$code = $_POST["code"];
	$create_p = $_POST["password"];
	$status = 'true';
	
	$querycheck ="select * from `users` where `name`='$name' OR `email`='$email'";
	$result = mysqli_query($con,$querycheck);
	//echo mysqli_num_rows($result);
	if(mysqli_num_rows($result) > 0){
			$msg = "<p class='text-danger'>User Name OR Email Already Exist!</p>";
	}else{
	
	$query = "insert into `users`(`name`,`email`,`code`,`password`,`status`)
	values('$name','$email','$code','$create_p','$status')";
	
	if(mysqli_query($con,$query)){
		header('Location:login.php');		
	}else{
			$msg = "<p class='text-danger'>Something went wrong!</p>";
	    }
	}	
}
echo mysqli_error($con);
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
</head>
<body>
	<div class="main">
		<div class="wthree_top_forms">
			<div class="agile-info_w3ls hvr-buzz-out">
				<h4>Registration for sharewheels</h4>
				<div class="agile-info_w3ls_grid">
				<div class="form-group">
				<?php echo $msg; ?>
				</div>
					<form action="#" method="post">
					<div class="form-group">
						<input type="text" name="name" class="form-control" placeholder="User Name" required=" ">
					</div>
					<div class="form-group">	
						<input type="email" name="email" class="form-control" placeholder="Email" required=" ">
					</div>
					<div class="form-group">	
						<input type="text" name="code" class="form-control" placeholder="Zip Postal Code" required=" ">
					</div>
					<div class="form-group">	
						<input type="password" name="password" placeholder="Password" class="form-control" required=" ">
					</div>
					<div class="form-group">	
						<input type="submit" name="submit" value="Sign Up">
					</div>
					</form>
					<h5>Already a member? <a href="login.php">Sign In</a></h5>
				</div>
			</div>
			
			<div class="clear"> </div>
		</div>
	</div>
</body>
</html>