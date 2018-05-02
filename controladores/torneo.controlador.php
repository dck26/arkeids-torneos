<?
class ControladorTorneo {
	/*=======================================
	=            MOSTRAR USUARIO            =
	=======================================*/
	
	static public function ctrMostrarTorneos($item, $valor) {

		$respuesta = ModeloTorneo::MdlMostrarTorneos($item, $valor);

		return $respuesta;

	}

}