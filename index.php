<?php session_start(); ?>
<?php require_once('incl/dbconnection.php'); ?>
<?php require_once ('incl/function.php');?>
<?php 

	
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
			$hashed_password = $password;

			$sql = "SELECT * FROM user WHERE email ='{$email}' AND password = '{$hashed_password}' LIMIT 1";

			$result = mysqli_query($conn,$sql);

			verify_query($result);
				
				if (mysqli_num_rows($result) == 1) 
					{
					 // valid user found
					  $user = mysqli_fetch_assoc($result);
					  $_SESSION['user_id'] = $user['id'];
					  $_SESSION['first_name'] = $user['first_name'];

					// Updating last_login field in DB when each user login
					  $sql = "UPDATE user SET last_login = NOW() WHERE id ={$_SESSION['user_id']} LIMIT 1";

					  $result = mysqli_query($conn, $sql);

					  verify_query($result);


					  header('Location: home.php');
					}
					else
					{
						$errors[] = 'Invalid username / Password';
					}
			}
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log In - User Management System</title>
	<link rel="stylesheet" type="text/css" href="CSS/main.css">
</head>
<body>
	<div class="login">

		<form action="index.php" method="POST">

			<fieldset>

				<legend><h1>Log In</h1></legend>

				<?php
				   if (isset($errors) && !empty($errors)) {
				   	echo '<p class="error">Invalid Username/Password</p>';
				   }
				?>

				<?php
				   if (isset($_GET['logout'])) {
				   	echo '<p class="info">You have Logout</p>';
				   }
				?>

				<p>
					<label for="">Username:</label>
					<input type="text" name="email" placeholder="Enter Email">
				</p>

				<p>
					<label for="">Password:</label>
					<input type="password" name="password">
				</p>

				<p>
					<button type="submit" name="submit">Login In</button>
				</p>

			</fieldset>

		</form>
	</div>
</body>
</html>

<?php mysqli_close($conn); ?>