<?php

include("connection.php");
$con= connection();
$id= $_GET['id'];
$sql = "DELETE FROM users WHERE id='$id'";
$result = mysqli_query($con,$sql);

if($result){
    Header ("Location: index.php");
}


?>