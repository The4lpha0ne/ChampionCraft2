<?php
include("connection.php");
$con = connection();
require "./validator.php";
redirect();

$nombreImagen = '';

$id = $_POST["id"];
$nombre=$_POST['nombre'];
$rol=$_POST['rol'];
$procedencia=$_POST['procedencia'];
$recurso=$_POST['recurso'];
$golpe=$_POST['golpe'];	
$imagen=$_FILES['imagen'];	

$sql ="UPDATE users SET nombre='$nombre'WHERE id ='$id' ";
$result = mysqli_query($con,$sql); 
$sql ="UPDATE users SET rol='$rol'WHERE id ='$id' ";
$result = mysqli_query($con,$sql); 
$sql ="UPDATE users SET procedencia ='$procedencia'WHERE id ='$id' ";
$result = mysqli_query($con,$sql); 
$sql = "UPDATE users SET recurso = '$recurso'WHERE id ='$id' ";
$result = mysqli_query($con,$sql); 
$sql = "UPDATE users SET golpe = '$golpe'WHERE id ='$id'";
$result = mysqli_query($con,$sql);
$sql = "UPDATE users SET imagen = '$imagen'WHERE id ='$id'";
$result = mysqli_query($con,$sql); 



 

if($result){
    Header("Location: index.php");
};
?>


