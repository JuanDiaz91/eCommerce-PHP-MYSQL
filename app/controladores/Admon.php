<?php
/**
 * Controlador administrativo
 */
class Admon extends Controlador{
    private $modelo;
    
    function __construct() {
        $this->modelo = $this->modelo("AdmonModelo");
    }

    function portada() {
        $datos = [
            "titulo" => "Administrativo",
            "menu" => false,
            "data" => []
        ];
        $this->vista("admonVista",$datos);
    }
    
    //
    public function verifica() {
        
        //Inicio arreglos
        $errores = [];
        $data = [];
        
        //Recibimos los datos de la vista
        if ($_SERVER['REQUEST_METHOD']=="POST") {
            
            //Limpiamos datos
            $usuario = isset($_POST["usuario"])?$_POST["usuario"]:"";
            $contraseña = isset($_POST["contraseña"])?$_POST["contraseña"]:"";
            
            //validaciones
            if (empty($usuario)) {
                array_push($errores,"El usuario es necesario");
            }
            if (empty($contraseña)) {
                array_push($errores,"La contraseña es necesaria");
            }
            
            //Arreglo de data
            $data = [
               "usuario" => $usuario,
               "contraseña" => $contraseña 
            ];
            
            //verificar errores
            if (empty($errores)) {
                
                //Ejecutar el query
                $errores =$this->modelo->verificarContraseña($data);
               
                //No hay errores
                if (empty($errores)) {
                    //Creamos la sesion
                    $sesion = new Sesion();
                    $sesion->iniciarLogin($data);

                    //Abrimos admonInicio
                    header("location:".RUTAAPP."admonInicio");
                }
            }
        }

        //Enviamos errores a la vista
        $datos = [
            "titulo" => "Administrativo",
            "menu" => false,
            "admon" => true,
            "errores" =>$errores,
            "data" => []
        ];
        $this->vista("admonVista",$datos);
        

    }
}

?>