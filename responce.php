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
		$msg= $control->jobcreatedbyuser($name2);
	}
	
?>

<html>
	<head>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<link href="css/Formstyle.css" rel="stylesheet" type="text/css" />
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
						<li ><a href="employee.php">Add job</a></li>
						<li class="current"><a href="responce.php">View Responce</a></li>
						<li><a href="index.php">job page</a></li>
					</ul>
				</div><!--end menubar-->
			</div><!--end header-->
		</div><!--end header-->

		<br></br>
	
		<form name="login-form"  align = "center" action="" method="post">
			<select name='type' class="dropdown">
				<?php while($row = mysqli_fetch_array($msg))
				{
					echo "<option value=".$row[0]." selected >".$row[1]."</option>";
				}
				?>
			</select>
			<input type="submit" name="login" value="Submit" align="left" class="buttonpag" />
		</form> 
	
		<br></br>
	
		<?php
				
			if(!empty($_POST['login']))
			{
				echo "<div class='job-view' >";
			
				$result = $control-> jobname($_POST['type']);
				while($row = mysqli_fetch_array($result))
				{
					echo "<div align= 'center'>";
					echo  "<font size='6'>Post:- $row[1]</font>";
					echo "</div>";;
				}
				echo "<br></br>";
				$students= $control-> jobintrestedstudent($_POST['type']);
				
				echo "<table width = '115%' align='center'>";
		
				echo "<tr>";
					echo "<td>Serial No.</td>";
					echo "<td>Name</td>";
					echo "<td>Username</td>";
					echo "<td>College</td>";
					echo "<td>Percentage</td>";
				echo "</tr>";
				$i=1;
				while($row = mysqli_fetch_array($students))
				{
					echo "<tr>";
						echo "<td>".$i++."</td>";
						echo "<td>".$row[0]."</td>";
						echo "<td>".$row[1]."</td>";
						echo "<td>".$row[3]."</td>";
						echo "<td>".$row[4]."%</td>";
					echo "</tr>";
				}
				echo "</table>";
				echo "</div>";
			}
			
		?>
	</body>
</html>