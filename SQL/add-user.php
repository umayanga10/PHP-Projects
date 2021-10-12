<?php

require_once ('../incl/dbconnection.php');

$errors = array();

if (isset($_POST['submit'])) 
	{

	  $req_fields = array('first_name','last_name','email','password');
	  
	  foreach ($$req_fields as $field) {
	  	if (empty(trim($_POST[$field]))) {
	  		$errors[] = $field.' is required';
	  	}
	  }
	
	}



?>