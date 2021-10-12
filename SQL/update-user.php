<?php

    include_once('../incl/dbconnection.php');

 		if (isset($_POST['submit'])) 
         {
            $id= $_POST['id'];
            $first_name = $_POST['fname'];
            $last_name = $_POST['lname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $hashed_password = sha1($password);

               $sql="UPDATE `user` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`password`='$hashed_password',`is_deleted`='0' WHERE `id`='$id'";

            if ($conn->query($sql) === TRUE) {
                // echo "Record updated successfully";
                header("Location: ../home.php?user_state=true");
              } else {
                echo "Error updating record: " . $conn->error;
              }
              

            
         }
 	?>