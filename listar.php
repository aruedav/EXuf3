<?php
session_start();

require 'model/Conexion.php';
require 'model/Select.php';
echo "<meta charset='utf-8'>";
if($_SESSION['nivel']=="admin"){

	$model = new Select();
	$model->mostrar();
	$mensaje = $model->error;


}else{
echo '<h2 align="center">No está autorizado a ver esta página.</h2>';
}
?>

