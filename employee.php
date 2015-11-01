<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
	session_start();
	include("data.php");
	$control=new jobs();
	$name1="Sign-Up";
	$name2="Log-In";
	$name3="Signupform.php";
	$name4="Login.php";
	$name5="";
	$name6="";
	if($_SESSION['type'] != 'employee')
	{
		header('Location: index.php');
	}
	if(!empty($_SESSION['login']))
	{
		$name1="";
		$name2=$_SESSION['login'];
		$name3="";
		$name4="";
		$name5="Logout";
		$name6="logout.php";
	}
	if(!empty($_POST['register'])) 
	{
			$cdetails=array();
			$cdetails[0]=$_SESSION['login'];
			$cdetails[1]=$_POST['jobid'];
			$cdetails[2]=$_POST['post'];
			$cdetails[3]=$_POST['startdate'];
			$cdetails[4]=$_POST['duration'];
			$cdetails[5]=$_POST['stipend'];
			$cdetails[6]=$_POST['postedon'];
			$cdetails[7]=$_POST['applicationdeadline'];
			$control->jobcreation($cdetails);	
	}
?>
<html>
	<head>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/Formstyle.css" />
	</head>

	<body>
		<div id="main">
			<div id="header">
				<div id="welcome">
	    
				</div><!--end welcome-->
				<div id="menubar">
					<ul id="menu">
						<li><a href=<?php echo $name3;?> ><?php echo "<span  class='style1'>".$name1."</span>";?></a></li>
						<li><a href=<?php echo $name4;?> ><?php echo "<span  class='style1'>".$name2."</span>"?></a></li>
						<li><a href=<?php echo $name6;?> ><?php echo "<span  class='style1'>".$name5."</span>";?></a></li>
					</ul>
				</div><!--end menubar-->
				<div id="menubar">
					<ul id="menu">
						<li class="current"><a href="employee.php">Add job</a></li>
						<li><a href="responce.php">View Responce</a></li>
						<li><a href="index.php">job page</a></li>
					</ul>
				</div><!--end menubar-->
			</div><!--end header-->
		</div><!--end header-->
		
		<br></br>
		
		<form name="login-form" class="login-form" action="" method="post">
			<div class="header">
				<h1>Job Creation Form</h1>
				<span>Fill out the form below to create job</span><br>
				<span>Date should be in YYYY/MM/DD format</span>
			</div>
		
			<div class="content">
				<input name="jobid" type="text" class="input" placeholder="job_id" required/>
				<input name="post" type="text" class="input" placeholder="Post" required/>
				<input name="startdate" type="text" class="input" placeholder="start date" required/>
				<input name="duration" type="text" class="input" placeholder="duration" required/>
				<input name="stipend" type="text" class="input" placeholder="stipend" required/>
				<input name="postedon" type="text" class="input" placeholder="posteon" required/>
				<input name="applicationdeadline" type="text" class="input" placeholder="applicationdeadline" required/>
			</div>

			<div class="footer">
				<input type="submit" name="register" value="Create job" class="button" />
			</div>
		
		</form>
	</body>
</html>