<?php
// Incluir conexion
require "connection.php";
$db = connection();
$errores = [];

$correo = '';
$contraseña = '';


if($_SERVER['REQUEST_METHOD'] === 'POST'){


    $correo = mysqli_real_escape_string($db,  $_POST['correo'] );

    $contraseña = mysqli_real_escape_string($db,  $_POST['contraseña'] );


    if(!$correo) {
        $errores[] = 'El email es obligatorio o no válido';
    }

    if(!$contraseña) {
        $errores[] = 'El password es obligatorio';
    }
  
    if(empty($errores)) {
  
        // Revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE correo = '$correo' ";
        $resultado = mysqli_query($db, $query);

        // El usuario existe.

        if($resultado->num_rows) {
            // Revisar si el password esta bien
            $usuario = mysqli_fetch_assoc($resultado);
    
            // Password a revisar y el de la BD.
            $auth = password_verify($contraseña, $usuario['contraseña']);

            if($auth) {
                // Autenticado.

                // Para autenticar usuarios estaremos utilizando la superglobal SESSION, esta va a mantener eso una sesión activa en caso de que sea valida.

                session_start();
                $_SESSION['usuario'] = $usuario['correo'];
                $_SESSION['id'] =$usuario['id'];
                $_SESSION['login'] = true;
                header("Location: index.php");
            } else {
                // No autenticado
                $errores[] = 'El Password es incorrecto';
            }
        
        } else {

            $errores[] = 'El Usuario no existe';
        }
   
    }
}

// include 'includes/funciones.php';
// incluirTemplate('header');
?>
<!DOCTYPE html>
<html lang="es" >
  <head>
    <meta charset="utf-8">
   <title>Log In</title>
    <link rel="stylesheet" href="./css/login.css">
    <!-- <link rel="stylesheet" href="./css/styles.css"> -->

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
    
</header>
  <main>
    <section class="login">

      <div class="wrapper">
        <img src="./img/logo.png" class="login__logo">

        <h1 class="login__title">Iniciar Sesión</h1>

        <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    
    <form method="POST" class="formulario" enctype="multipart/form-data" novalidate>
      <fieldset>
        <label class="login__label">
          <span>Correo</span>
          <input type="text" name="correo" id="correo" class="input">
        </label>  
  
        <label class="login__label">
          <span>Contraseña</span>
          <input type="password" name="contraseña" id="contraseña" class="input">
        </label>
  
        <div class="login__icons">
          <button type="button" class="icons__button">
            <img src="./img/facebook-icon.png" alt="facebok">
          </button>
  
          <button type="button" class="icons__button">
            <img src="./img/google-icon.png" alt="facebok">
          </button>
  
          <button type="button" class="icons__button">
            <img src="./img/apple-icon.png" alt="facebok">
          </button>
        </div>
  
        <label class="login__label--checkbox">
          <input type="checkbox" class="input--checkbox">
          Mantener sesión iniciada
        </label>
        </div>

        <div class="wrapper">
        <button type="submit" class="login__button">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path d="M438.6 278.6l-160 160C272.4 444.9 264.2 448 256 448s-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L338.8 288H32C14.33 288 .0016 273.7 .0016 256S14.33 224 32 224h306.8l-105.4-105.4c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160C451.1 245.9 451.1 266.1 438.6 278.6z"/>
          </svg>
        </button>
      </fieldset> 
   </form>


        <a href="#" class="login__link">¿No consigues iniciar sesión?</a>
        <a href="create_user.php" class="login__link">Crear Cuenta</a>
      </div>

    </section>

    <section class="wallpaper" id="wallpaper"></section>
  </main>
  
</body>
</html>