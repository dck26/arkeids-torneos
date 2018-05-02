<?php

require_once "conexion.php";

class ModeloPersona {

	/*========================================
	=            MOSTRAR USUARIOS            =
	========================================*/
	
	static public function mdlMostrarPersona($item, $valor){

		$tabla = "01_Persona";

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
	
	static public function mdlIngresarPersona($tabla, $datos) {

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

		$stmt = Conexion::conectar()->prepare("SELECT count(apodo) FROM $tabla WHERE apodo = :apodo OR email = :email");
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
	=            REGISTRO PEROSONA            =
	========================================*/	
	
	static public function mdlCrearPersona($datos) {

		if(ModeloPersona::mdlPersonaDuplicada($datos)) {
			return "duplicado";
		} else {

		$tabla = "01_persona";

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, apodo, password, email, foto) VALUES (:nombre, :apodo, :password, :email, :foto)");
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
	}
		$stmt -> close();

		$stmt = null;



	}




}