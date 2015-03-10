<?php 
session_start();
require 'model/Conexion.php';
require 'model/Select.php';

$usuario = $_SESSION['user'];
$nivel = $_SESSION['nivel'];

if(isset($_POST['login'])){

		$model = new Select;
		$model->nombre = htmlspecialchars($_POST['usuario']);
		$model->password = htmlspecialchars($_POST['password']);
		$model->login();
		$mensaje = $model->error;


}



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
</head>
<body>
<strong><?php   echo $mensaje;?></strong>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	usuario <input type="text" name="usuario"><br>
	password <input type="text" name="password"><br>
	<input type="submit" value="Entrar">
	<input type="hidden" name="login">

	<?php if($_SESSION['nivel'] == "admin"){
		echo '<br><a href="listar.php">listar usuarios</a><br><a href="insertar.php">añadir usuarios</a>';
	}


	?>



</form>
</body>
</html>