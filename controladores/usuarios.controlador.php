<?php

class ControladorUsuarios{

    /*=============================================
    INGRESO DE USUARIO
    =============================================*/

    static public function ctrIngresoUsuario(){

        if(isset($_POST["ingUsuario"])){

            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){



                $tabla = "usuarios";

                $item = "usuario";
                $valor = $_POST["ingUsuario"];

                $respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

                if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"]){

                    if($respuesta["estado"] == 1){

                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["id"] = $respuesta["id"];
                        $_SESSION["nombre"] = $respuesta["nombre"];
                        $_SESSION["usuario"] = $respuesta["usuario"];
                        $_SESSION["foto"] = $respuesta["foto"];
                        $_SESSION["perfil"] = $respuesta["perfil"];

                        /*=============================================
                        REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
                        =============================================*/

                        date_default_timezone_set('America/Bogota');



                    }else{

                        echo '<br>
							<div class="alert alert-danger">El usuario aún no está activado</div>';

                    }

                }else{

                    echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';

                }

            }

        }

    }

    /*=============================================
	REGISTRO DE USUARIO
	=============================================*/

    static public function ctrCrearUsuario(){

        if(isset($_POST["nuevoUsuario"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

                /*=============================================
                VALIDAR IMAGEN
                =============================================*/

                $ruta = "";



                $tabla = "usuarios";



                $datos = array( "nombre" => $_POST["nuevoNombre"],
                                "usuario" => $_POST["nuevoUsuario"],
                                "password" => $_POST["nuevoPassword"],
                                "perfil" => $_POST["nuevoPerfil"],
                                "foto"=>$ruta);

                $respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

                if($respuesta == "ok"){

                    echo '<script>

					Swal.fire({
                        
						icon: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: false,
						timer: 1500

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

					</script>';


                }


            }else{

                echo '<script>

					Swal.fire({
                        icon:"error",
						title:"Error...",
						text: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						confirmButtonText: "OK"
						
					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

				</script>';

            }


        }


    }

}



