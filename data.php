<?php
class jobs
{
	/**
	 * Constructor of jobs class
	 */
	function jobs() 
	{    
		$this->connection=mysqli_connect("localhost","root","root");
		if (mysqli_connect_errno())
  		{
  			echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		}		
  		mysqli_select_db($this->connection,"ninternshala");
	} 
	
	/** 
	 *	Adding employee to the database 
	 */
	function addemployee($cdetails)
	{
		$query="INSERT INTO employee (company, username, password) VALUES ('$cdetails[0]','$cdetails[1]','$cdetails[2]')";
		$result = mysqli_query($this->connection,$query);
		
		if(!$result)
			echo "<script>alert('Please choose different username')</script>";
		else
		{
			echo "<script>alert('Employee account created')</script>";
		    //header('Location: index.php');
		}
	}
	
	/** 
	 * 	Adding student to the database
	 */
	function addstudent($cdetails)
	{
		$query="INSERT INTO student (name, username, password, college,percentage) VALUES ('$cdetails[0]','$cdetails[1]','$cdetails[2]','$cdetails[3]','$cdetails[4]')";
		$result = mysqli_query($this->connection,$query);
		
		if(!$result)
			echo "<script>alert('Please choose different username')</script>";
		else
		{
			echo "<script>alert('Student account created')</script>";
		    //header('Location: index.php');
		}
	}
	
	/** 
	 * Checking weather user has applied for the clicked job
	 */
	function appliedcheck($userid,$jobid)
	{
		$query="SELECT * FROM applied WHERE student_id='$userid' and job_id='$jobid'";
		$result = mysqli_query($this->connection,$query);
		if(($row = mysqli_fetch_array($result)))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	/** 
	 * Applying for clicked job
	 */
	function apply($jobid,$userid)
	{
		$query="INSERT INTO applied (job_id, student_id) VALUES ('$jobid','$userid')";
		$result = mysqli_query($this->connection,$query);
		
		if(!$result)
			echo "Databse Error";
		else
		{
			echo "<script>alert('Thank You for appling this job')</script>";
		    //header('Location: index.php');
		}
	}
	
	/** 
	 * Authenticating the employee
	 */
	function authenticateemployee($username,$password)
	{
		$query="SELECT * FROM employee WHERE username='$username' AND password='$password'";
		$result = mysqli_query($this->connection,$query);
		if($result == FALSE) 
		{
			die(mysql_error()); // TODO: better error handling
			return 0;
		}
			
		if(!($row = mysqli_fetch_array($result)))
		{
			//echo "<script>alert('Enter Correct Credential')</script>";
			return 0;
		}
		if(!($username==$row[1]&&$password==$row[2]))
		{
			//echo "<script>alert('Username or Password do not match')</script>";
			return 0;
		}
		return 1;
	}
	
	/** 
	 * Authenticating the student
	 */
	function authenticatestudent($username,$password)
	{
		$query="SELECT * FROM student WHERE username='$username' AND password='$password'";
		$result = mysqli_query($this->connection,$query);
		if($result == FALSE) 
		{
			die(mysql_error()); // TODO: better error handling
			return 0;
		}
			
		if(!($row = mysqli_fetch_array($result)))
		{
			//echo "<script>alert('Enter Correct Credential')</script>";
			return 0;
		}
		if(!($username==$row[1]&&$password==$row[2]))
		{
			//echo "<script>alert('Username or Password do not match')</script>";
			return 0;
		}return 1;
	}
	
	/** 
	 * 
	 */
	function correctInput($control,$options)
	{
		$options=stripslashes($options);
		$options = mysqli_real_escape_string($this->connection,$options);
		return $options;
	}
	
	/** 
	 * Creating a job
	 */
	function jobcreation($row)
	{
		$query="INSERT INTO job (job_id,opening_post,start_date,period,salary,posted_on,expires) VALUES 
		('$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]')";
		$result = mysqli_query($this->connection,$query);
		
		if(!$result)
			echo "Databse Error";
		else
		{
			$query="INSERT INTO creates (id,emp_id) VALUES ('$row[1]','$row[0]')";
			$result = mysqli_query($this->connection,$query);
			if(!$result)
			{
				echo "Databse Error";	
			}
			else
				echo "<script>alert('Job has been created')</script>";
		}
	}
	
	/** 
	 * job which are created by particular user
	 */
	function jobcreatedbyuser($empid)
	{
		$query="select * from job where job_id in (select id from creates where emp_id='$empid' )";
		$result = mysqli_query($this->connection,$query);
		return $result;
	}
	
	/** 
	 * jobName using jobid
	 */
	function jobname($job_id)
	{
		$query="select * from job where job_id = '$job_id'";
		$result = mysqli_query($this->connection,$query);
		return $result;
	}
	
	/** 
	 * showing the students information 
	 * who applied for particular job
	 */
	function jobintrestedstudent($jobid)
	{
		$query="select * from student where username in(select student_id from applied where job_id='$jobid')";
		$result = mysqli_query($this->connection,$query);
		return $result;
	}
	
	/** 
	 * Showing all the jobs on main page
	 */
    function joblisting()
	{
		$query="select j.opening_post,e.company,j.start_date,j.period,j.salary,j.posted_on,j.expires,j.job_id from job j,creates c,employee e where j.job_id=c.id and c.emp_id= e.username";
		$result = mysqli_query($this->connection,$query);
		return $result;
	}
	
	/** 
	 * Check the type of user
	 * Accordingly navigates to the page
	 */
	function login($userid, $password,$type)
	{
		if($type == 'student')
		{
			$auth=$this->authenticatestudent($userid,$password);
			if($auth==0)
				echo "<script>alert('Wrong Username or password')</script>";
		    //return "Wrong Username or password";
			else
			{
				$_SESSION['login']= $userid;
				$_SESSION['password']= $password;
				$_SESSION['type']= $type;
				header('Location:index.php');
			}
		}
		else
		{
			$auth=$this->authenticateemployee($userid,$password);
			if($auth==0)
				echo "<script>alert('Wrong Username or password')</script>";
				//return "Wrong Username or password";
			else
			{
				$_SESSION['login']= $userid;
				$_SESSION['password']= $password;
				$_SESSION['type']= $type;
				header('Location:employee.php');
			}
		}
	}
	
	/** 
	 * Signout
	 */
	function signout()
	{
		session_unset();
		session_destroy();
	}
}
?>
