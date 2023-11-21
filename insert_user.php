<?php
include("connection.php");
$con= connection();
require "./validator.php";
redirect();
$id = null;
$nombreImagen = '';

$errores=[];

if($_SERVER['REQUEST_METHOD']==='POST'){

    $id = $_POST['id'];
    $nombre=$_POST['nombre'];
    $rol=$_POST['rol'];
    $procedencia=$_POST['procedencia'];
    $recurso=$_POST['recurso'];
    $golpe=$_POST['golpe'];
    $imagen=$_FILES['imagen'];


    $carpetaImagenes='./imagenes/';
    $nombreImagen=md5(uniqid(rand(),true)).".jpg";
    
    if (!is_dir($carpetaImagenes)){
        mkdir($carpetaImagenes);
    }

    move_uploaded_file($imagen['tmp_name'], $carpetaImagenes.$nombreImagen);

    $sql ="INSERT INTO users VALUES ('$id','$nombre' ,'$rol','$procedencia','$recurso','$golpe' , '$nombreImagen')";
    $result = mysqli_query($con,$sql);

    if($result){
        Header("Location: index.php?result=ok");
    }
}



?>
<!DOCTYPE html>
<html lang="es" >
  <head>
    <meta charset="utf-8">
   <title>insertar personaje</title>
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
  <main>
    <img src="./css/icono.png" class="icono">
    <div class="users-form">
         
    <form action=" ?p" method="POST" enctype="multipart/form-data">
                


                <input type="text" name="nombre" placeholder="Nombre">
                
                <select id="posicion" name="rol" aria-placeholder="Posicion" >
                    <option value="Top">Top</option>
                    <option value="Jungla">Jungle</option>
                    <option value="Medio">Mid</option>
                    <option value="Bot">Bot</option>
                    <option value="Support">Support</option>
                </select>
                
                <select id="Procedencia" name="procedencia" aria-placeholder="Procedencia" >
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
               
                <select id="recurso" name="recurso" aria-placeholder="Recurso" >
                    <option value="Mana">Mana</option>
                    <option value="Energia">Energia</option>
                    <option value="Vida">Vida</option>
                    <option value="Furia">Furia</option>
                    <option value="Flujo">Flujo</option>
                    <option value="Sin recurso">Sin recurso</option>
                </select>
                
                <select id="Tipo de golpe" name="golpe" aria-placeholder="Tipo de golpe" >
                    <option value="Cuerpo a cuerpo">Cuerpo a cuerpo</option>
                    <option value="A distancia">A distancia</option>
                </select>   
                <input class="inputimagen" type="file" id="imagen" name="imagen">
                <input type="submit" value="Agregar Campeon">
            </form>
            </main>
  </body>

 </html>