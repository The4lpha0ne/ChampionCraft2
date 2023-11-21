<?php
include("connection.php");
require "./validator.php";
redirect();
$con= connection();
$sql= "SELECT * FROM users";
$result=mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="es" >
  <head>
    <meta charset="utf-8">
   <title>Personajes</title>
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <link rel="stylesheet" href="./css/styles.css">
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/script.js" defer></script>
    <script src="js/active.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
<header>
  <div class="preloader d-flex align-items-center justify-content-center">
    <div class="preloader-circle"></div>
    <div class="preloader-img">
        <img src="img/LOL_Logo.png" alt="">
    </div>
</div>
    <nav>
        <div class="logo">
            <a href="index.php" class="logotipo"><img src="./img/LOL_Logo.png" alt=""></a>
        </div>
      
        <ul>
        
        <li><a href="index.php">Personajes</a></li>
        <li><a href="insert_user.php">Crear Personajes</a></li>
        <li><a href="log_in.php">Iniciar Sesión</a></li>
        <li><a href="./cerrar_sesion.php">Cerrar sesion</a></li>
      </ul>
    </nav>
  </header>

    <!-- <img src="./css/icono.png" class="icono"> -->
    <div class="users-form">
            

    </div>
    <br><br><br><br><br>
    <div class="users-table">
         
        <table>
            <thead>
                <tr class="tablapj" >    
                    <!-- <th>ID</th> -->
                    <th>Campeon</th>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Procedencia</th>
                    <th>Recurso </th>
                    <th>Golpe</th>
                    <th></th>
                    <th></th>
                </tr>

            </thead>

            <tbody>
                <?php while($row  = mysqli_fetch_array($result)):?>

                <tr>
                    
                    <!-- <th> <?= $row ['id']?> </th> -->
                    <td> <img src="../imagenes/<?php echo $row['imagen']?>">   </td>
                    <th> <?= $row ['nombre']?> </th>
                    <th> <?= $row ['rol']?> </th>
                    <th> <?= $row ['procedencia']?> </th>
                    <th> <?= $row ['recurso']?> </th>
                    <th> <?= $row ['golpe']?> </th>
                    

                    <th> <a href="update.php?id=<?=$row ['id']?> " class="users-table--edit">Editar</a></th>
                    <th><a href="delete_user.php?id=<?=$row ['id']?>" class="users-table--delete" >Eliminar</a></th>
                </tr>
                <?php endwhile;?>   
            </tbody>
        </table>
    </div>
</body>
</html>