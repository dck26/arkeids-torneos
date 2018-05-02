<?php

require_once "conexion.php";

class ModeloTorneo {

	/*========================================
	=            MOSTRAR USUARIOS            =
	========================================*/
	
	static public function mdlMostrarTorneos($item, $valor){

		$tabla = "05_Torneo";

		if($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
		}
		else {

			$stmt = Conexion::conectar()->prepare("SELECT idTorneo05, fecha, 02_Juego.nombre as juego, 04_Lugar.nombre as lugar, horaInicio FROM 05_TORNEO INNER JOIN 04_LUGAR ON (05_Torneo.idLugar04 = 04_Lugar.idLugar04) INNER JOIN 02_Juego ON (05_Torneo.idJuego02 = 02_Juego.idJuego02)");

			$stmt -> execute();

			return $stmt -> fetchAll();			
		}

		$stmt -> close();

		$stmt = null;

	}
}