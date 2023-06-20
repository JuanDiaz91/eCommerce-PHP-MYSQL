<?php
/**
 * Controlador Sombreros
*/

class Sombreros extends Controlador {

    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("sombrerosModelo");
    }

    function portada() {
        $sesion = new sesion();
        if ($sesion->getLogin()) {
            //leer productos bisuteria
            $data = $this->getSombreros();

            $datos = [
                "titulo" => "Sombreros",
                "activo"=>"sombreros",
                "data" => $data,
                "menu" => true
            ];
            $this->vista("sombrerosVista", $datos);
        } else {
            header("location:".RUTAAPP);
        }
    }

    public function getSombreros() {
        $data = [];
        $data = $this->modelo->getSombreros();
        return $data;
    }

}

?>