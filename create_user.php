<?php
require "connection.php";
$db = connection();
$errores = [];

$correo = '';
$contraseña = '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtener datos del formulario
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios(correo, contraseña) VALUES('$email', '$passwordHash') ";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario creado con éxito.";
    } else {
        echo "Error al crear el usuario: " . $conn->$errores;
    }

   
}
?>

<h2>Crear Nuevo Usuario</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="correo">Correo:</label>
    <input type="text" name="correo" required>
    <br>
    <label for="contraseña">Contraseña:</label>
    <input type="password" name="contraseña" required>
    <br>
    <input type="submit" value="Crear Usuario">
</form>

</body>
</html>