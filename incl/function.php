<?php

function verify_query($result_set)
{
	global $conn;

	if (!$result_set) 
		{
		  die("Databse query faild:".mysqli_error());
		}
}

?>