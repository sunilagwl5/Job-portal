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
	   if($_POST['name'] !='' && $_POST['username'] !='' && $_POST['password'] !='' && $_POST['college'] !='' && $_POST['percentage'] !='' )
	   {
		   if($_POST['password'] == $_POST['Confirm_password'])
			{
				$cdetails=array();
				$cdetails[0]=$_POST['name'];
				$cdetails[1]=$_POST['username'];
				$cdetails[2]=$_POST['password'];
				$cdetails[3]=$_POST['college'];
				$cdetails[4]=$_POST['percentage'];
				$msg = $control->addstudent($cdetails);
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
        Student SignUp Form
    </title>
    <link rel="stylesheet" type="text/css" href="css/Formstyle.css" />
</head>

<body>
	<div id="wrapper1">
		<br></br>
		<form name="login-form" class="login-form" action="" method="post">
			<div class="header">
				<a align="center" href=index.php >Back</a>
				<h1>Sign-Up Form</h1>
				<span>Fill out the form below to Signup </span>
			</div>
	
			<div class="content">
				<input name="name" type="text" class="input" placeholder="Name" />
				<input name="username" type="text" class="input" placeholder="User name" />
				<input name="college" type="tel" class="input" placeholder="College" />
				<input name="percentage" type="text" class="input" placeholder="Percentage" />
				<input name="password" type="password" class="input" placeholder="Password" />
				<input name="Confirm_password" type="password" class="input" placeholder="Confirm Password" />
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
