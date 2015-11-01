<?php
	$strin = "b.php?";
	$i=0;
	foreach($_GET as $x=>$x_value)
	{
		if($i!=0)
		  $strin= $strin.",";
		
		$strin=  $strin."".$x."=".$x_value;
		$i=1;
	}

	echo $strin;
?>
