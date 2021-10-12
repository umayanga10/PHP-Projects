<?php session_start(); ?>
<?php require_once('incl/dbconnection.php'); ?>
<?php require_once ('incl/function.php'); ?>
<?php
  if (!isset($_SESSION['user_id'])) 
  	{
  	  header('Location: index.php');
  	}

  	$user_list = '';

  	$sql = "SELECT * FROM user WHERE is_deleted=0 ORDER BY first_name";
  	$users = mysqli_query($conn, $sql);

  	verify_query($users); 
  		
  		 while ($user=mysqli_fetch_assoc($users)) 
  		 	{
  		 		$user_list .="<tr>";
				$user_list .="<td>{$user['id']}</td>";
  		 		$user_list .="<td>{$user['first_name']}</td>";
  		 		$user_list .="<td>{$user['last_name']}</td>";
  		 		$user_list .="<td>{$user['last_login']}</td>";
  		 		$user_list .="<td><a href=\"edit.php?user_id={$user['id']}\">Edit</a></td>";
  		 		$user_list .="<td><a href=\"SQL/delete.php?user_id={$user['id']}\">Delete</a></td>";
  		 		$user_list .="</tr>";
  		 	}
?>
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
 	<h1>Users <span><a href="add-user.php">Add User</a></span></h1>
<a href="add-user.php"></a>
		
 	<table class="masterlist">
 		<tr>
			<th>ID</th>
 			<th>First Name</th>
 			<th>Last Name</th>
 			<th>Last Login</th>
 			<th>Edit</th>
 			<th>Delete</th>
 		</tr>

 		<?php echo $user_list; ?>
 	</table>
 </main>

</body>
</html>