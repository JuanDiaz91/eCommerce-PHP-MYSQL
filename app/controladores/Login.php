<?php
/**
 * Controlador Login 
*/

class Login extends Controlador {

    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("LoginModelo");
    }

    function portada() {
        if(isset($_COOKIE["datos"])) {
            $datos_array = explode("|",$_COOKIE["datos"]);
            $usuario = $datos_array[0];
            $contraseña = $datos_array[1];
            $data = [
                "usuario" => $usuario,
                "contraseña" => $contraseña,
                "recordar" => "on"
            ];
        } else {
            $data = [];
        }
        $datos = [
            "titulo" => "Login", 
            "menu" => false,
            "data" => $data
        ];
        $this->vista("loginVista", $datos);
    }

    function olvido() {
        $errores = [];
        $data = [];
        if ($_SERVER['REQUEST_METHOD']=="POST") {
            $email = isset($_POST["email"])?$_POST["email"]:"";
            if ($email =="") {
                    array_push($errores, "El email es necesario");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    array_push($errores, "El email utilizado no es válido");
            }
            if(count($errores)==0) {
                if ($this->modelo->validarCorreo($email)) {
                        array_push($errores, "El email utilizado no se encuentra registrado");                       
                } else {
                    if(!$this->modelo->enviarCorreo($email)) {                       
                        $datos = ["titulo" => "Cambio de contraseña", 
                            "menu" => false, 
                            "errores" => [],
                            "data" => [],
                            "subtitulo" =>"Cambio de contraseña", 
                            "texto"=> "Se ha enviado un conrreo a <b>".$email."</b> para que cambies tú contraseña",
                            "color"=>"alert-success",
                            "url"=> "login",
                            "colorBoton"=>"btn-success",
                            "textoBoton"=>"Volver"
                        ];
                        $this->vista("mensajeVista",$datos);
                    } else {
                        $datos = ["titulo" => "Error en el envío del correo", 
                            "menu" => false, 
                            "errores" => [],
                            "data" => [],
                            "subtitulo" =>"Error en el envío del correo", 
                            "texto"=> "Ocurrió un error al envíar el correo electrónico. Intentelo más tarde.",
                            "color"=>"alert-danger",
                            "url"=> "login",
                            "colorBoton"=>"btn-danger",
                            "textoBoton"=>"Volver"
                        ];
                        $this->vista("mensajeVista",$datos);
                    }
                }
            }   
        } else {
            $datos = [
                "titulo" => "Olvidaste la contraseña", 
                "menu" => false, 
                "errores" => [],
                "data" => [],
                "subtitulo" =>"¿Olvidaste tú contraseña?" 
            ];
            $this->vista("olvidoVista",$datos);
        }
        if (count($errores)) {
            $datos = [
                "titulo" => "Olvidaste tú contraseña", 
                "menu" => false, 
                "errores" => $errores,
                "subtitulo" =>"¿Olvidaste tú contraseña?",
                "data" => []
            ];
            $this->vista("olvidoVista", $datos);
        }
    }

    function registro() {
        $errores = [];
        if ($_SERVER['REQUEST_METHOD']=="POST") {
            $nombre = isset($_POST["nombre"])?$_POST["nombre"]:"";
            $primerApellido = isset($_POST["primerApellido"])?$_POST["primerApellido"]:"";
            $segundoApellido = isset($_POST["segundoApellido"])?$_POST["segundoApellido"]:"";
            $email = isset($_POST["email"])?$_POST["email"]:"";
            $contraseña1 = isset($_POST["contraseña1"])?$_POST["contraseña1"]:"";
            $contraseña2 = isset($_POST["contraseña2"])?$_POST["contraseña2"]:"";
            $direccion = isset($_POST["direccion"])?$_POST["direccion"]:"";
            $ciudad = isset($_POST["ciudad"])?$_POST["ciudad"]:"";
            $provincia = isset($_POST["provincia"])?$_POST["provincia"]:"";
            $codpos = isset($_POST["codpos"])?$_POST["codpos"]:"";
            $pais = isset($_POST["pais"])?$_POST["pais"]:"";
            $data = [
                "nombre" => $nombre,
                "primerApellido" => $primerApellido,
                "segundoApellido" => $segundoApellido,
                "email" => $email,
                "contraseña1" => $contraseña1,
                "contraseña2" => $contraseña2,
                "direccion" => $direccion,
                "ciudad" => $ciudad,
                "provincia" => $provincia,
                "codpos" => $codpos,
                "pais" => $pais
            ];
            //validación
            if ($nombre =="") {
                array_push($errores, "El nombre es necesario");
            }
            if ($primerApellido =="") {
                array_push($errores, "El primerApellido es necesario");
            }
            if ($email =="") {
                array_push($errores, "El email es necesario");
            }
            if ($contraseña1 =="") {
                array_push($errores, "La contraseña1 es necesario");
            }
            if ($contraseña2 =="") {
                array_push($errores, "La contraseña2 es necesario");
            }
            if ($direccion =="") {
                array_push($errores, "La direccion es necesaria");
            }
            if ($ciudad =="") {
                array_push($errores, "La ciudad es necesaria");
            }
            if ($provincia =="") {
                array_push($errores, "La provincia es necesaria");
            }
            if ($codpos =="") {
                array_push($errores, "El código postal es necesario");
            }
            if ($pais =="") {
                array_push($errores, "El pais es necesario");
            }
            if ($contraseña1!=$contraseña2) {
                array_push($errores, "Las contraseñas no coinciden");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errores, "El email no es válido");
            }
            if (count($errores)==0) {
                $resultado = $this->modelo->insertarRegistro($data);
                if ($resultado) {
                    $datos = ["titulo" => "Bievenid@ a la tienda de AFAJE", 
                        "menu" => false, 
                        "errores" => [],
                        "data" => [],
                        "subtitulo" =>"Cambalache tienda solidaria", 
                        "texto"=> "Gracias por su registro.",
                        "color"=>"alert-success",
                        "url"=> "menu",
                        "colorBoton"=>"btn-success",
                        "textoBoton"=>"Iniciar"
                    ];
                    $this->vista("mensajeVista",$datos);
                } else {
                    $datos = ["titulo" => "Error en el registro", 
                        "menu" => false, 
                        "errores" => [],
                        "data" => [],
                        "subtitulo" =>"Error en el registro", 
                        "texto"=> "Ocurrió un error en el registro, puede que el email insertado ya exista. Por favor verifique su email.",
                        "color"=>"alert-danger",
                        "url"=> "login",
                        "colorBoton"=>"btn-danger",
                        "textoBoton"=>"Volver"
                    ];
                    $this->vista("mensajeVista",$datos);
                }
            } else {
                $datos = [
                    "titulo" => "Registro usuario", 
                    "menu" => false, 
                    "errores" => $errores,
                    "data" => $data
                ];
                $this->vista("loginRegistroVista", $datos);
                }
        } else {
            $datos = [
                "titulo" => "Registro usuario", 
                "menu" => false
            ];
            $this->vista("loginRegistroVista", $datos);
        }
    }
    function cambiarclave() {
        $data=[];
        $errores = array();
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $id = isset($_POST["id"])?$_POST["id"]:"";
            $contraseña1 = isset($_POST["contraseña1"])?$_POST["contraseña1"]:"";
            $contraseña2 = isset($_POST["contraseña2"])?$_POST["contraseña2"]:"";
            //validaciones
            if ($contraseña1=="") {
                array_push($errores, "La contraseña es necesaria");
            }
            if ($contraseña2=="") {
                array_push($errores, "La contraseña de verificación es necesaria");
            }
            if ($contraseña1!=$contraseña2) {
                array_push($errores, "Las contraseñas no coinciden");
            }
            if (count($errores)) {
                //si hay errores
                $datos = [
                    "titulo" => "Cambiar contraseña",
                    "menu" => false,
                    "errores" => $errores,
                    "data" => $data
                ];
                $this->vista("loginCambiaContraseña",$datos);
            } else {
                //No hay errores
                if ($this->modelo->cambiarContraseñaAcceso($id, $contraseña1)) {
                $datos = [
                    "titulo" => "Modificar contraseña",
                    "menu" => false,
                    "errores" => [],
                    "data" => [],
                    "subtitulo" => "Modificar contraseña",
                    "texto" => "La modificación de la contraseña se realizó con exito. Bienvenido nuevamente.",
                    "color" => "alert-success",
                    "url" => "login",
                    "colorBoton" => "btn-success",
                    "textoBoton" => "Volver"
                ];
                $this->vista("mensajeVista",$datos);
                } else {
                $datos = [
                    "titulo" => "Error al modificar la contraseña",
                    "menu" => false,
                    "errores" => [],
                    "data" => [],
                    "subtitulo" => "Error al modificar la contraseña",
                    "texto" => "Existió un error al modificar la contraseña.",
                    "color" => "alert-danger",
                    "url" => "login",
                    "colorBoton" => "btn-danger",
                    "textoBoton" => "Volver"
                ];
                $this->vista("mensajeVista",$datos);
                }
            }
            } else {
            $datos = [
                "titulo" => "Cambia clave de acceso",
                "menu" => false,
                "data" => $data
            ];
            $this->vista("loginCambiaContraseña",$datos);
        }
    }

    function verifica() {
        $errores = [];
        if($_SERVER["REQUEST_METHOD"]=="POST") {
            $usuario = isset($_POST["usuario"])?$_POST["usuario"]:"";
            $contraseña = isset($_POST["contraseña"])?$_POST["contraseña"]:"";
            $recordar = isset($_POST["recordar"])?"on":"off";
            $errores = $this->modelo->verificar($usuario, $contraseña);
            //Recuerdame
            $valor = $usuario."|".$contraseña;
            if($recordar == "on") {
                $fecha = time()+(60*60*24*7);
            } else {
                $fecha = time()-1;
            }
            setcookie("datos", $valor, $fecha, RUTAAPP);
            //
            $data = [
                "usuario" => $usuario,
                "contraseña" => $contraseña,
                "recordar" => $recordar
            ];
            //Validación
            if(empty($errores)) {
                //Iniciamos sesión
                $data = $this->modelo-> getUsuarioCorreo($usuario);
                $sesion = new Sesion();
                $sesion->iniciarLogin($data);
                //
                header("location:".RUTAAPP."tienda");
            } else {
                $datos = [
                    "titulo" => "Login", 
                    "menu" => false,
                    "errores" => $errores,
                    "data" => $data
                ];
                $this->vista("loginVista", $datos);
            }
        }
    }
}

?>