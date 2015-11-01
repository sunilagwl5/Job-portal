<!DOCTYPE html>

<?php
	session_start();
	$myusername=$mypassword="";
	include("data.php");
  
	$msg="";
	$control=new jobs();
	if(!empty($_POST['register']))
	{
		//Do all the submission part or storing in DB work and all here
		header('Location: Signupform.php');
	}	
	if(!empty($_POST['login']))
	{
		//Do all the submission part or storing in DB work and all here
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$myusername=$control->correctInput($control,$_POST['username']);
			$mypassword=$control->correctInput($control,$_POST['password']);
			$type=$control->correctInput($control,$_POST['type']);
			if (!(empty($myusername)||empty($mypassword)))
			{
				$msg=$control->login($myusername,$mypassword,$type);
			}
			else
			{
				echo "<script>alert('Either username or password is missing ')</script>";		    
			}
		}
	}
?>
<html lang='en'>
	<head>
		<meta charset="UTF-8" /> 
		<title>
			Login
		</title>
		<link rel="stylesheet" type="text/css" href="css/Formstyle.css" />
	</head>
	<body>
	<div id="wrapper">
		<form name="login-form" class="login-form" action="" method="post">
			<div class="header">
				<a align="center" href=index.php >Back</a>
				<h1>Login Form</h1>
				<span>Fill out the form below to login </span>
			</div>

			<div class="content">
				<input name="username" type="text" class="input username" placeholder="Username" />
				<div class="user-icon"></div>
				<input name="password" type="password" class="input password" placeholder="Password" />
				<div class="pass-icon"></div>		
				<select name='type' class="input1 username" width="200px" >
					<option value="employee">Employee</option>
					<option value="student">Student</option>
				</select>
			</div>

			<div class="footer">
				<input type="submit" name="login" value="Login" class="button" />
				<input type="submit" name="register" value="Register" class="button" />
			</div>	
		</form>
	</div>
	<div class="gradient">
	</div>

	</body>
</html>
