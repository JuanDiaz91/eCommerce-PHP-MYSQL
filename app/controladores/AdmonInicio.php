<?php
/**
 * Controlador Tienda
*/

class AdmonInicio extends Controlador {

    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("AdmonInicioModelo");
    }

    function portada() {
        //Creamos sesion
        $sesion = new Sesion();

        if ($sesion->getLogin()) {
            $datos = [
                "titulo" => "Administración | inicio", 
                "menu" => false,
                "admon" => true,
                "data" => []
            ];
            $this->vista("AdmonInicioVista", $datos);
        } else {
            header("location:" .RUTAAPP."admon");
        }

    }
}

?>