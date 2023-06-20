<?php
/**
 *  Controlador usuarios admon.
 */

 class AdmonUsuarios extends Controlador {
    private $modelo;

    function __construct() {

        $this->modelo = $this->modelo("AdmonUsuariosModelo");
    }

    public function portada() {
        //Creamos sesion
        $sesion = new Sesion();

        if ($sesion->getLogin()) {

            //Leemos los datos de la tabla
            $data = $this->modelo->getUsuarios();
            
            $datos = [
                "titulo" => "Administrativo Usuarios",
                "menu" => false,
                "admon" => true,
                "data" => $data
            ];
            $this->vista("admonUsuariosPortadaVista", $datos);
        } else {
            header("location:" .RUTAAPP."admon");
        }
    }

    public function alta() {

        if($_SERVER['REQUEST_METHOD']=="POST") {
            $errores = [];
            $data = [];
            $usuario = isset($_POST['usuario'])?$_POST['usuario']:"";
            $contraseña1 = isset($_POST['contraseña1'])?$_POST['contraseña1']:"";
            $contraseña2 = isset($_POST['contraseña2'])?$_POST['contraseña2']:"";
            $nombre = isset($_POST['nombre'])?$_POST['nombre']:"";
            //validación
            if(empty($usuario)) {
                array_push($errores, "El usuario es necesario");
            }
            if(empty($contraseña1)) {
                array_push($errores, "La contraseña es necesaria");
            }
            if(empty($contraseña2)) {
                array_push($errores, "La verificación de la contraseña es necesaria");
            }
            if($contraseña1 != $contraseña2) {
                array_push($errores, "Las contraseñas no coinciden");
            }
            if(empty($nombre)) {
                array_push($errores, "El nombre del usuario es necesario");
            }
            //Crear arreglo de datos
            $data = [
                "nombre" => $nombre,
                "contraseña1" => $contraseña1,
                "contraseña2" => $contraseña2,
                "usuario" => $usuario
            ];
            //verificamos que no hay errores
            if (empty($errores)) {
                if ($this->modelo->insertarDatos($data)) {
                    header("location:".RUTAAPP."admonUsuarios");
                } else {
                $datos = ["titulo" => "Error en el registro", 
                    "menu" => false, 
                    "errores" => [],
                    "data" => [],
                    "subtitulo" =>"Error en el registro", 
                    "texto"=> "Ocurrió un error en el registro. Por favor intentelo más tarde.",
                    "color"=>"alert-danger",
                    "url"=> "admonInicio",
                    "colorBoton"=>"btn-danger",
                    "textoBoton"=>"Volver"
                ];
                $this->vista("mensajeVista",$datos);

                }

            } else {
                $datos = [
                    "titulo" => "Administrativo Usuarios Alta",
                    "menu" => false,
                    "admon" => true,
                    "errores" => $errores,
                    "data" => $data
                ];
                $this->vista("admonUsuariosVista", $datos);
            } 
        } else {
            $datos = [
                "titulo" => "Administrativo Usuarios Alta",
                "menu" => false,
                "admon" => true,
                "data" => []               
            ];
            $this->vista("admonUsuariosVista", $datos);
        }
    }

    public function baja($id="") {
        //Definiendo arreglos
        $errores = [];
        $data = [];

        //Recibiendo de la vista
        if($_SERVER['REQUEST_METHOD']=="POST") {
            $id = isset($_POST['id'])?$_POST['id']:"";
            if (!empty($id)) {
                $errores = $this->modelo->bajaLogica($id);
                //Si no hay errores regresamos
                if (empty($errores)) {
                    header("location:".RUTAAPP."admonUsuarios");
                }
            }

        }

        $data = $this->modelo->getUsuarioId($id);
        $llaves = $this->modelo->getLlaves("admonStatus");

        //Abrir la vista
        $datos = [
            "titulo" => "Administrativo Usuarios Baja",
            "menu" => false,
            "admon" => true,
            "status" =>$llaves,
            "errores" => $errores,
            "data" => $data               
        ];
        $this->vista("admonUsuariosBorraVista", $datos);
    }

    public function cambio($id="") {
        //Definiendo arreglos
        $errores = [];
        $data = [];

        //Recibiendo de la vista
        if($_SERVER['REQUEST_METHOD']=="POST") {
            //Limpiando variables
            $id = isset($_POST['id'])?$_POST['id']:"";
            $correo = isset($_POST['correo'])?$_POST['correo']:"";
            $contraseña1 = isset($_POST['contraseña1'])?$_POST['contraseña1']:"";
            $contraseña2 = isset($_POST['contraseña2'])?$_POST['contraseña2']:"";
            $nombre = isset($_POST['nombre'])?$_POST['nombre']:"";
            $status = isset($_POST['status'])?$_POST['status']:"";

            //validación
            if(empty($correo)) {
                array_push($errores, "El usuario es necesario");
            }
            if(empty($nombre)) {
                array_push($errores, "El nombre del usuario es necesario");
            }
            if($status=="void") {
                array_push($errores, "Selecciona el status del usuario.");
            }
            if(!empty($contraseña1) && !empty($contraseña2)) {
                if($contraseña1 != $contraseña2) {
                    array_push($errores, "Los valores no coinciden");
                }    
            }

            if (empty($errores)) {
                //Crear arreglo de datos
                $data = [
                    "id" => $id,
                    "nombre" => $nombre,
                    "contraseña1" => $contraseña1,
                    "contraseña2" => $contraseña2,
                    "status" => $status,
                    "correo" => $correo
                ];
                //Enviamos al modelo
                $errores = $this->modelo->modificaUsuario($data);
    
                //Validamos la modificación
                if (empty($errores)) {
                    header("location:".RUTAAPP."admonUsuarios");
                }
            }
        }
        $data = $this->modelo->getUsuarioId($id);
        $llaves = $this->modelo->getLlaves("admonStatus");
        $datos = [
            "titulo" => "Administrativo Usuarios Modifica",
            "menu" => false,
            "admon" => true,
            "status" => $llaves,
            "errores" => $errores,
            "data" => $data               
        ];
        $this->vista("admonUsuariosModificaVista", $datos);        
    }
 }
?>