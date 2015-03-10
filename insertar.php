<?php
session_start();

require 'model/Conexion.php';
require 'model/Insert.php';

if($_SESSION['nivel']=="admin"){



if(isset($_POST['insertar'])){

	$model = new Insert();

	$model->nombre = htmlspecialchars($_POST['usuario']);
	$model->password = htmlspecialchars($_POST['password']);
	$model->email = htmlspecialchars($_POST['email']);
	$model->rol = htmlspecialchars($_POST['rol']);
	$model->insertar();
	$mensaje = $model->error;

	echo $mensaje;
}




?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

usuario	<input type="text" name="usuario"> <br>
password	<input type="password" name="password"> <br>
email	<input type="email" name="email"> <br>
rol	<select name="rol">
		<option value="1">Guest</option>
		<option value="2">User</option>
		<option value="3">Admin</option>
	</select>
<br>

<input type="submit" value="insertar">
<input type="hidden" name="insertar">
</form>
</body>
</html>
<?php

}else{

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
</head>
<body>
<h2 align="center">No está autorizado a ver esta página.</h2>
</body>
</html>

<?php

}
 ?>