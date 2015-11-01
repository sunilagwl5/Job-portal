<?php
	session_start();
	include("data.php");
	
	$control=new jobs();
	$control->signout();
	
	header("Location: index.php");
?>