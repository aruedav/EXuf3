<?php


Class Insert{

	public $nombre;
	public $password;
	public $rol;
	public $email;
	public $error;

	public function insertar(){

		$model  = new Conexion();
		$conexion = $model->conectar();

/*
	insert into users (name, email, pass, rol) values (:nombre, :email, :pass, :rol)
*/

	$sql = "insert into users (name, email, pass, rol) values (:nombre, :email, :pass, :rol)";

	$consulta = $conexion->prepare($sql);
	$consulta -> bindParam(":nombre",$this->nombre);
	$consulta -> bindParam(":email",$this->email);
	$consulta -> bindParam(":pass",$this->nombre);
	$consulta -> bindParam(":rol",$this->rol);

if(!$consulta){
		$this->mensaje = $conexion->errorInfo();
}else{
	$consulta->execute();
	$this->error = "Usuario registrado correctamente.";
}

	}

}