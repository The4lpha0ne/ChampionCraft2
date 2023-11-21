<?php 

    // Consultar la propiedad
    include "connection.php";
    $con= connection();



    // Inserta un admin
    $email = "aiream@correo.com";
    $password = "12345678";

    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    // echo strlen($passwordHash);


    // echo $passwordHash;


    $query = "INSERT INTO usuarios(correo, contraseña) VALUES('$email', '$passwordHash') ";

    echo $query;

    mysqli_query($con, $query);


?>