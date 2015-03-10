<?php
session_start();



Class Select{

	public $nombre;
	public $password;
	public $nivel;
	public $error;


	public function login(){


		$model = new Conexion();
		$conexion = $model->conectar();
		/*
			//consulta de prueba hecha en phpmyadmin

			SELECT users.name, rols.description
			FROM users
			INNER JOIN rols ON users.rol = rols.idrols
			WHERE users.name =  "admin"
			AND users.pass =  "12345"
		*/

	$sql = "SELECT users.name, rols.description FROM users INNER JOIN rols ON users.rol = rols.idrols WHERE users.name =  :usuario AND users.pass =  :password";

	$consulta = $conexion->prepare($sql);
	$consulta -> bindParam(":usuario",$this->nombre);
	$consulta -> bindParam(":password",$this->password);

	$consulta->execute();

	$resultado = $consulta->rowCount();

	if($resultado == 1){

		$resultado = $consulta->fetch();

		$_SESSION['user'] = $resultado['name'];
		$_SESSION['nivel'] = $resultado['description'];

		$this->error = "Bienvenido ".$_SESSION['user'].", tu nivel es de ".$_SESSION['nivel'];

	}else{
		$this->error = "Error, usuario o contraseña incorrectos.";
		$_SESSION['nivel'] == "";
	}

	}


	public function mostrar(){

		$model = new Conexion();
		$conexion = $model->conectar();
		
		$sql = "select * from users inner join rols on users.rol = rols.idrols";
		$consulta = $conexion->prepare($sql);
	$consulta->execute();

	$cont = $consulta->rowCount();

	if($cont >0){
$i=0;
//idusers	name	email	pass	rol
 
	echo "<table border='1' align='center'>";
	echo "<tr><td>idusers</td><td>name</td><td>email</td><td>rol</td></tr>";
		while($i<$cont){
			$resultado = $consulta->fetch();
			echo "<tr>";
			echo "<td>".$resultado['idusers']."</td>";
			echo "<td>".$resultado['name']."</td>";
			echo "<td>".$resultado['email']."</td>";
			echo "<td>".$resultado['description']."</td>";
			echo "</tr>";

			$i++;
		}
	echo "</table>";
	echo "<h4 align='center'>Por motivos de seguridad no se muestran las contraseñas</h4>";
	}else{
		$this->error ="error al mostrar los registros";
	}


}
}