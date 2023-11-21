<?php
include("connection.php");
$con= connection();
require "./validator.php";
redirect();

$id= $_GET['id'];
$sql= "SELECT * FROM users WHERE id='$id'";
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);



?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Editar usuarios</title>

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
        <img src="./css/icono.png" class="icono">
        <div class="users-form">
            <form action="edit_user.php" method="POST">
        
                <input type="hidden" name="id" value="<?= $row['id']?>">
                <input type="text" name="nombre" placeholder="Nombre" value="<?= $row['nombre']?>">
                <select id="posicion" name="rol" aria-placeholder="Posicion" value="<?= $row['rol']?>">>
                    <option value="Top">Top</option>
                    <option value="Jungla">Jungle</option>
                    <option value="Medio">Mid</option>
                    <option value="Bot">Bot</option>
                    <option value="Support">Support</option>
                </select> 
                <select id="Procedencia" name="procedencia" aria-placeholder="Procedencia" value="<?= $row['procedencia']?>">>
                    <option value="Aguas Estancadas">Aguas Estancadas</option>
                    <option value="Ciudad de Bandle">Ciudad de Bandle</option>
                    <option value="Demacia">Demacia</option>
                    <option value="El vacio">El vacio</option>
                    <option value="Freljord">Freljord</option>
                    <option value="Islas de las sombras">Islas de las sombras</option>
                    <option value="Ixtal">Ixtal</option>
                    <option value="Jonia">Jonia</option>
                    <option value="Noxus">Noxus</option>
                    <option value="Piltover">Piltover</option>
                    <option value="Piltover">Shurima</option>
                    <option value="Piltover">Targon</option>
                    <option value="Piltover">Zaun</option>
                </select> 
                <select id="recurso" name="recurso" aria-placeholder="Recurso" value="<?= $row['recurso']?>"> 
                    <option value="Mana">Mana</option>
                    <option value="Energia">Energia</option>
                    <option value="Vida">Vida</option>
                    <option value="Furia">Furia</option>
                    <option value="Flujo">Flujo</option>
                    <option value="Sin recurso">Sin recurso</option>
                </select> 
                <select id="Tipo de golpe" name="golpe" aria-placeholder="Tipo de golpe" value="<?= $row['golpe']?>">
                    <option value="Cuerpo a cuerpo">Cuerpo a cuerpo</option>
                    <option value="A distancia">A distancia</option>
                </select> 
                <input type="file" name="imagen" placeholder="Imagen" value="<?= $row['imagen']?>">
                <input type="submit" value="Actualizar informacion">
            </form>
        </div>
    </body>
</html>