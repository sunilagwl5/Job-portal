<!DOCTYPE html>
<?php
   
  include("data.php");
  
  $msg="";
  $control=new jobs();
   if(!empty($_POST['login']))
   {
		header('Location: Login.php');
   }
   if(!empty($_POST['register'])) 
   {
		if($_POST['company'] !='' && $_POST['username'] !='' && $_POST['password'] )
		{
		   if($_POST['password'] == $_POST['confirm_password'])
			{
				$cdetails=array();
				$cdetails[0]=$_POST['company'];
				$cdetails[1]=$_POST['username'];
				$cdetails[2]=$_POST['password'];
				$msg = $control->addemployee($cdetails);
				header('Refresh: 1;Location: Login.php');
			}
			else
				echo "<script>alert('Password Do not match Try Again')</script>";	
		}	
		else
			echo "<script>alert('Please Fill all the entries')</script>";
   }
  
?>

<html lang='en'>
	<head>
		<meta charset="UTF-8" /> 
		<title>
			Employee SignUp
		</title>
		<link rel="stylesheet" type="text/css" href="css/Formstyle.css" />
	</head>
	<body>
	<div id="wrapper1">
		<br></br>
		<br></br>
		<form name="login-form" class="login-form" action="" method="post">
			<div class="header">
				<a align="center" href=index.php >Back</a>
				<h1>Sign-Up Form</h1>
				<span>Fill out the form below to Signup </span>
			</div>
	
			<div class="content">
				<input name="company" type="text" class="input" placeholder="Company" />
				<input name="username" type="text" class="input" placeholder="Username" />
				<input name="password" type="password" class="input" placeholder="Password" />
				<input name="confirm_password" type="password" class="input" placeholder="Confirm Password" />
			</div>

			<div class="footer">
				<input type="submit" name="register" value="Register" class="button" />
				<input type="submit" name="login" value="Login" class="button" />
			</div>
		</form>
	</div>
	<div class="gradient"></div>

	</body>
</html>
