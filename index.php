<!DOCTYPE html>
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
	
	if(!empty($_SESSION['login']))
	{
		$name1="";
		$name2=$_SESSION['login'];
		$name3="";
		$name4="";
		$name5="Logout";
		$name6="logout.php";
	}
	if(!empty($_POST['varname']))
	{
		$var_value = $_POST['varname'];
		if($_SESSION['type']=='student')
		{
			if($control->appliedcheck($name2,$var_value) == true)
			{
				echo "<script>alert('You have already applied for this job')</script>";
			}
			else
			{
				$control->apply($var_value,$_SESSION['login']);
			}
		}
		else if($_SESSION['type']=='employee')
		{
			echo "<script>alert('Employee can not apply for job')</script>";
		}
		else
		{
			header('Location: Login.php');
		}
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
				<?php
				if(!empty($_SESSION['type']) && $_SESSION['type'] == 'employee')
				{
					echo "<div id='menubar'>";
					echo "<ul id='menu'>";
					echo "<li ><a href='employee.php'>Add job</a></li>";
					echo "<li><a href='responce.php'>View Responce</a></li>";
					echo "<li class='current'><a href='index.php'>job page</a></li>";
					echo "</ul>";
					echo "</div><!--end menubar-->";
				}
				?>
			</div><!--end header-->
		</div><!--end header-->
		<br></br>
		<?php
			$msg =  $control->joblisting();
			while($row = mysqli_fetch_array($msg))
			{
				echo "<div class= 'job-view'>";
				echo "<br></br>";
				echo "<table width = '75%' align='right'>";
					echo "<tr>";
						echo "<td colspan='5'>".$row[0]."</td>";
					echo "</tr>";
		
					echo "<tr>";
						echo "<td  colspan='5'>".$row[1]."</td>";
					echo "</tr>";
		
					echo "<tr>";	
						echo "<td>Start Date</td>";
						echo "<td>Duration</td>";
						echo "<td>Stipend</td>";
						echo "<td>Posted On</td>";
						echo "<td>Application Deadline</td>";
					echo "</tr>";
		
					echo "<tr>";	
						echo "<td>".$row[2]."</td>";
						echo "<td>".$row[3]."</td>";
						echo "<td>".$row[4]."</td>";
						echo "<td>".$row[5]."</td>";
						echo "<td>".$row[6]."</td>";
					echo "</tr>";
				
				echo "</table>";
		
				echo "<br></br>";
				echo "<form  action='' align = 'center' method='post'>"; 
					echo "<input type='hidden' name='varname' value='".$row[7]."'>";
			
					echo "<div >";
						echo "<input class='buttonpag' type='submit' name='login' align = 'center' value='Apply'>";
					echo "</div>";
				echo "</form>";
				echo "<br></br>";
				echo "</div>";
				echo "<br></br>";
			}
		?>
	</body>
</html>
