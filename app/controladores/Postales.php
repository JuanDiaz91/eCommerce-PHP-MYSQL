<?php
/**
 * Controlador postales
*/

class Postales extends Controlador {

    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("postalesModelo");
    }

    function portada() {
        $sesion = new sesion();
        if ($sesion->getLogin()) {
            //leer productos bisuteria
            $data = $this->getPostales();

            $datos = [
                "titulo" => "Postales",
                "activo"=>"postales",
                "data" => $data,
                "menu" => true
            ];
            $this->vista("postalesVista", $datos);
        } else {
            header("location:".RUTAAPP);
        }
    }

    public function getPostales() {
        $data = [];
        $data = $this->modelo->getPostales();
        return $data;
    }

}

?>