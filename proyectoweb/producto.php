<?php include("plantillas/cabecera.php"); ?>
<?php
require("cnx.php");
$cod = isset($_POST["txtcodigo"]) ? $_POST["txtcodigo"] : "";
$nom = isset($_POST["txtnom"]) ? $_POST["txtnom"] : "";
$can = isset($_POST["txtcan"]) ? $_POST["txtcan"] : "";
$pre = isset($_POST["txtpre"]) ? $_POST["txtpre"] : "";
$accion = isset($_POST["accion"]) ? $_POST["accion"] : "";
if ($accion == "Guardar") {
    $consulta = "INSERT INTO productos(codPro, NomPro, cantidad, precio) VALUES('$cod', '$nom', '$can', '$pre')";
    $ejecutar = mysqli_query($camino, $consulta);
    echo "Datos almacenados correctamente";
} elseif ($accion == "Modificar") {
    $consulta = "UPDATE productos SET cantidad = '$can', NomPro = '$nom', precio = '$pre' WHERE codPro = '$cod'";
    $ejecutar = mysqli_query($camino, $consulta);
    echo "Datos modificados correctamente";
} elseif ($accion == "Eliminar") {
    $consulta = "DELETE FROM productos WHERE codPro = '$cod'";
    $ejecutar = mysqli_query($camino, $consulta);
    echo "Datos eliminados correctamente";
} elseif ($accion == "Buscar") {
    $consulta = "SELECT * FROM productos WHERE codPro = '$cod'";
    $ejecutar = mysqli_query($camino, $consulta);
    $datos = mysqli_fetch_array($ejecutar);
    $cod = $datos['codPro'];
    $nom = $datos['NomPro'];
    $can = $datos['cantidad'];
    $pre = $datos['precio'];
} else {
    echo "Realize una accion";
}
?>
<h1>Productos</h1>
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <form method="POST">
                <div class="mb-3">
                    <label for="" class="form-label">Codigo</label>
                    <input type="text" class="form-control" name="txtcodigo" id="txtcodigo" placeholder="" value="<?php echo $cod ?>"/>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="txtnom" id="txtnom" placeholder="" value="<?php echo $nom ?>"/>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Cantidad</label>
                    <input type="text" class="form-control" name="txtcan" id="txtcan" placeholder="" value="<?php echo $can ?>"/>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Precio</label>
                    <input type="text" class="form-control" name="txtpre" id="txtpre" placeholder="" value="<?php echo $pre ?>"/>
                </div>
                <button type="submit" name="accion" value="Guardar" class="btn btn-primary">Guardar</button>
                <button type="submit" name="accion" value="Modificar" class="btn btn-success">Modificar</button>
                <button type="submit" name="accion" value="Eliminar" class="btn btn-danger">Eliminar</button>
                <button type="submit" name="accion" value="Buscar" class="btn btn-warning">Buscar</button>
            </form>
        </div>
    </div>
</div>
<?php include("plantillas/pie.php"); ?>