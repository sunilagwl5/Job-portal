<!DOCTYPE html>
<?php
   
	include("data.php");
  
	$msg="";
	$control=new jobs();
	if(!empty($_POST['employee']))
	{
		//Do all the submission part or storing in DB work and all here
		header('Location: signupemployee.php');
	}
	if(!empty($_POST['student'])) 
	{
		header('Location: signupstudent.php');		
	}
  
?>

<html lang='en'>
	<head>
		<meta charset="UTF-8" /> 
		<title>
		SignUp
		</title>
		<link rel="stylesheet" type="text/css" href="css/Formstyle.css" />
	</head>

	<body>
		<div id="wrapper1">
		<br></br>
		<br></br>
		<br></br>
		<br></br>
		<br></br>
			<form name="login-form" class="login-form" action="" method="post">
				<div class="header">
					<a align="center" href=index.php >Back</a>
					<h1>Sign-Up Form</h1>
					<span>Please choose User type </span>
				</div>
	
				<div class="footer">
					<input type="submit" name="employee" value="Employee" class="button" />
					<input type="submit" name="student" value="Student" class="button" />
				</div>
			</form>
		</div>
		<div class="gradient"></div>
	</body>
</html>
