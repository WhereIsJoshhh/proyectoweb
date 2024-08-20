<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>guardar Usuarios</title>
</head>
<body>
    <form action="guardarbd.php" method="POST">
        <label for="">Ingrese el nombre de usuario</label>
        <input type="text" name="txtusuario">
        <br><br>
        <label for="">ingrese el nombre de contraseña</label>
        <input type="text" name="txtcontraseña">
        <br><br>
        <input type="submit" value="guardar">
    </form>
</body>
</html>
<?php
require("cnx.php");
$txtusuario = $_POST["txtusuario"];
$txtcontraseña = $_POST["txtcontraseña"];
try {
    $consulta = "INSERT INTO usuarios (usua, contra) VALUES('$txtusuario', '$txtcontraseña')";
    $ejecutar = mysqli_query($camino, $consulta);
    echo "Datos almacenados correctamente";
} catch (Exception $ex) {
    echo "Error no se puede almacenar: " . $ex->getMessage();
}
?>