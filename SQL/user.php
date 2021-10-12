<?php 
	
	require_once('../incl/dbconnection.php'); 
	
	if (isset($_POST['submit'])) 
		{
			$errors = array();

		if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1 ) 
			{
				$errors[]= 'Username is Missing /Invalid';
			}

		if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1 ) 
			{
				$errors[]= 'Password is Missing /Invalid';
			}

		if (empty($errors)) 
		{
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);
			$hashed_password = sha1($password);

			$sql = "SELECT * FROM user WHERE email ='{$email}' AND password = '{$hashed_password}' LIMIT 1";

			$result = mysqli_query($conn,$sql);

			if ($result) {
				
				if (mysqli_num_rows($result) == 1) 
					{
					  header('Location: user.php');
					}
					else
					{

						$errors[] = 'Invalid username / Password';
						header('Location: ../index.php');
					}
			}
			else
			{
				$errors[] = 'Database query failed';
			}

		}


	}


?>













