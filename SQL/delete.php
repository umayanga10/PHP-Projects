<?php

    include_once('../incl/dbconnection.php');

    $id =$_GET['user_id'];

    $sql = "DELETE FROM user WHERE id=$id";

    $conn->query($sql);

    header("Location: ../home.php");

?>