<?php
require("cnx.php");
$U = $_POST["txtUsuario"];
$C = $_POST["txtContraseña"];
try {
    $consulta = "SELECT * FROM usuarios WHERE usua = '$U' AND contra = '$C'";
    $ejecutar = mysqli_query($camino, $consulta);
    if (mysqli_num_rows($ejecutar) > 0) {
        header("location: inicio.php");
    } else {
        echo "usuario y/o contraseña incorrecta";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
mysqli_close($camino);
?>