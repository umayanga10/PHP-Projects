<?php session_start(); ?>
<?php require_once ('incl/dbconnection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
	<link rel="stylesheet" type="text/css" href="CSS/main.css">
</head>
<body>
 <header>
 	<div class="appname">User Management System</div>
 	<div class="loggedin">Welcome <?php echo $_SESSION['first_name']; ?>! <a href="SQL/logout.php">Log Out</a></div>
 </header>

 <main>
 	<h1>Add New User <span><a href="add-user.php">Back to User list</a></span></h1>

 	<?php

       $errors = array();
       $first_name = '';
       $last_name = '';
       $email = '';
       $password = '';

 		if (isset($_POST['submit'])) 
         {
            $first_name = $_POST['fname'];
            $last_name = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $hashed_password = sha1($password);

               $sql="INSERT INTO user (first_name,last_name,email,password,is_deleted) VALUES ('".$first_name."','".$last_name."','".$email."','".$hashed_password."',0)";

                $result = mysqli_query($conn, $sql);

                  if ($result) {
                     header('Location: home.php?user_added=true');
                  }

            
         }
 	?>
   
   <form action="add-user.php" method="POST" class="userform">
   		<p>
   			<label>First Name:</label>
   			<input type="text" name="fname">
   		</p>
   		<p>
   			<label>Last Name:</label>
   			<input type="text" name="lname">
   		</p>
   		<p>
   			<label>Email:</label>
   			<input type="email" name="email">
   		</p>
   		<p>
   			<label>New Password:</label>
   			<input type="password" name="password">
   		</p>

   		<p>
   			<label>&nbsp</label>
   			<button type="submit" name="submit">Save</button>
   		</p>
   </form>
 	

 </main>

</body>
</html>