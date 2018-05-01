<?php

require_once "conexion.php";

class ModeloUsuarios {

	/*========================================
	=            MOSTRAR USUARIOS            =
	========================================*/
	
	static public function mdlMostrarUsuarios($tabla, $item, $valor){

		if($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
		}
		else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();			
		}

		$stmt -> close();

		$stmt = null;

	}


	/*========================================
	=            REISTRO USUARIOS            =
	========================================*/	
	
	static public function mdlIngresarUsuario($tabla, $datos) {

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, usuario, password, perfil, foto) VALUES (:nombre, :usuario, :password, :perfil, :foto)");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

		if($stmt->execute()) {

			return "ok";
		}
		else {
			return "error";
		}
		$stmt -> close();

		$stmt = null;



	}


	/*========================================
	=   CHECAR DUPLICIDAD PERSONA            =
	========================================*/	

	static public function mdlPersonaDuplicada($datos) {

		$tabla = "01_persona";

		$stmt = Conexion::conectar()->prepare("SELECT sApodo FROM $tabla WHERE sApodo = :apodo OR sEmail = :email");
		$stmt -> bindParam(":apodo", $datos["apodo"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->execute();


		if($stmt->fetchColumn() > 0) {

			return true;
		}
		else {
			return false;
		}

		$stmt -> close();

		$stmt = null;

	}
	


	/*========================================
	=            REGISTRO USUARIOS            =
	========================================*/	
	
	static public function mdlCrearUsuario($datos) {

		if(ModeloUsuarios::mdlPersonaDuplicada($datos)) {
			return "duplicado";
		}

		$tabla = "01_persona";

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (sNombre, sApodo, sPassword, sEmail, sFoto) VALUES (:nombre, :apodo, :password, :email, :foto)");
		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":apodo", $datos["apodo"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

		if($stmt->execute()) {

			return "ok";
		}
		else {
			return "error";
		}
		$stmt -> close();

		$stmt = null;



	}




}