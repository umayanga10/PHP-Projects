<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 <?php
    include_once('incl/dbconnection.php');

    $sql ="SELECT * FROM user WHERE id=".$_GET['user_id'];
    $result = $conn->query($sql);


        $row = $result->fetch_array();
    
    

 ?>
	 <form action="SQL/update-user.php" method="POST" class="userform">
     <input type="hidden" name="id" value="<?= $row['id']; ?>">
   		<p>
   			<label>First Name:</label>
   			<input type="text" name="fname" value="<?= $row['first_name']; ?>">
   		</p>
   		<p>
   			<label>Last Name:</label>
   			<input type="text" name="lname" value="<?= $row['last_name']; ?>">
   		</p>
   		<p>
   			<label>Email:</label>
   			<input type="email" name="email" value="<?= $row['email']; ?>">
   		</p>
   		<p>
   			<label>New Password:</label>
   			<input type="password" name="password" value="<?= $row['passowrd']; ?>">
   		</p>

   		<p>
   			<label>&nbsp</label>
   			<button type="submit" name="submit">Save</button>
   		</p>
   </form>
 	
</body>
</html>