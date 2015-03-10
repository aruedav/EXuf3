<?php


Class Conexion{

		public function conectar(){

		$usuario = 'root';
		$password =  '';
		$host = 'localhost';
		$db = 'exuf3';
		return $conexion = new PDO("mysql:host=$host;dbname=$db",$usuario, $password);
	}
}