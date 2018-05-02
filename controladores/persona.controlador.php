<?php

class ControladorPersona {

	/*=======================================
	=            INGRESO PERSONA            =
	=======================================*/
	
	public function ctrIngresoPersona() {

		if(isset($_POST['ingresoEmail']) && isset($_POST['ingresoPassword'])) {

			if(
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST['ingresoPassword'])) {

			   	$encriptar = crypt($_POST['ingresoPassword'],'$2a$07$usesomesillystringforsalt$');

				$item = "sEmail";

				$valor = $_POST['ingresoEmail'];

				$respuesta = ModeloPersona::MdlMostrarPersona($item, $valor);

				if($respuesta["sEmail"] == $_POST["ingresoEmail"] &&
				   $respuesta["sPassword"] == $encriptar) {

				   	$_SESSION["iniciarSesion"] = "ok";
				    $_SESSION["id"] = $respuesta["id"];
				    $_SESSION["nombre"] = $respuesta["nombre"];
				    $_SESSION["usuario"] = $respuesta["usuario"];
				    $_SESSION["foto"] = $respuesta["foto"];
				    $_SESSION["perfil"] = $respuesta["perfil"];

				   echo '<script>
				   			window.location = "inicio";
				   		</script>';

				}
				else {
					echo '<script>
					swal({
						type: "error",
						title: "¡Error en el usuario/password!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false						
					}).then((result)=> {
						if(result.value){
							window.location = "login";
						}
					});
					</script>';
				
				}
			}
		}
	}

	/*=======================================
	=            CREAR PERSONA            =
	=======================================*/
	
	public function ctrCrearPersona() {

		if(isset($_POST["nuevoUsuario"])) {
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])) {

				/*======================================
				=            VALIDAR IMAGEN            =
				======================================*/
				$ruta = "";

				if(isset($_FILES["nuevaFoto"]["tmp_name"])) {

					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
					
					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*===========================================================
					=            CREAR EL DIRECTORIO PARA EL USUARIO            =
					===========================================================*/
					
					$directorio = "vistas/img/usuarios/".$_POST["nuevoUsuario"];

					mkdir($directorio,0755);

					/*=============================================================================
					=            SE APLICAN LAS FUNCIONES DE ACUERDO AL TIPO DE IMAGEN            =
					=============================================================================*/

					if($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}
					if($_FILES["nuevaFoto"]["type"] == "image/png") {

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}
					
				}

				$tabla = "usuarios";

				$encriptar = crypt($_POST["nuevoPassword"],'$2a$07$usesomesillystringforsalt$');

				$datos = array("nombre" => $_POST["nuevoNombre"],
						"usuario" => $_POST["nuevoUsuario"],
						"password" => $encriptar,
						"perfil" => $_POST["nuevoPerfil"],
						"foto" => $ruta);

				$respuesta = ModeloPersona::mdlIngresarPersona($tabla, $datos);

				if($respuesta == "ok") {
					echo '<script>
					swal({
						type: "success",
						title: "¡El usuario se guardó correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false						
					}).then((result)=> {
						if(result.value){
							window.location = "usuarios";
						}
					});
					</script>';
				}
			}
			else {
			echo '<script>
					swal({
						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false						
					}).then((result)=> {
						if(result.value){
							window.location = "usuarios";
						}
					});
					</script>';
		}
		}

		}

	/*=======================================
	=            MOSTRAR USUARIO            =
	=======================================*/
	
	static public function ctrMostrarPersonas($item, $valor) {

		$tabla = "usuarios";
		$respuesta = ModeloPersona::MdlMostrarPersonas($tabla, $item, $valor);

		return $respuesta;

	}


	/*=======================================
	=            REGISTRO PERSONA            =
	=======================================*/

public function ctrRegistroPersona() {

		if(isset($_POST["registroNombre"])) {
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["registroNombre"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["registroApodo"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["registroPassword"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["registroPasswordRepite"]) &&
				preg_match('/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,})$/', $_POST["registroEmail"])) {

				if($_POST["registroPassword"] != $_POST['registroPasswordRepite']) {

					echo '<script>
					swal({
						type: "error",
						title: "¡El password no coincide!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false						
					}).then((result)=> {
						if(result.value){
							window.location = "registro";
						}
					});
					</script>';

				}
				else {

				/*======================================
				=            VALIDAR IMAGEN            =
				======================================*/
				$ruta = "";

				if(isset($_FILES["nuevaFoto"]["tmp_name"])) {

					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
					
					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*===========================================================
					=            CREAR EL DIRECTORIO PARA EL USUARIO            =
					===========================================================*/
					
					$directorio = "vistas/img/usuarios/".$_POST["registroApodo"];

					mkdir($directorio,0755);

					/*=============================================================================
					=            SE APLICAN LAS FUNCIONES DE ACUERDO AL TIPO DE IMAGEN            =
					=============================================================================*/

					if($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["registroApodo"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}
					if($_FILES["nuevaFoto"]["type"] == "image/png") {

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["registroApodo"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}
					
				}

				$tabla = "persona";

				$encriptar = crypt($_POST["registroPassword"],'$2a$07$usesomesillystringforsalt$');

				$datos = array("nombre" => $_POST["registroNombre"],
						"apodo" => $_POST["registroApodo"],
						"email" => $_POST["registroEmail"],
						"password" => $encriptar,
						"foto" => $ruta);

				$respuesta = ModeloPersona::mdlCrearPersona($datos);

				if($respuesta == "ok") {
					echo '<script>
					swal({
						type: "success",
						title: "¡El usuario se guardó correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false						
					}).then((result)=> {
						if(result.value){
							window.location = "login";
						}
					});
					</script>';
				}
				else if($respuesta = "duplicado") {
					echo '<script>
					swal({
						type: "error",
						title: "¡Ya existe un jugador con ese email o apodo!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false						
					}).then((result)=> {
						if(result.value){
							window.location = "usuarios";
						}
					});
					</script>';
				}
			} }
			else {
			echo '<script>
					swal({
						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar",
						closeOnConfirm: false						
					}).then((result)=> {
						if(result.value){
							window.location = "usuarios";
						}
					});
					</script>';
		}
		}

		}

}




?>