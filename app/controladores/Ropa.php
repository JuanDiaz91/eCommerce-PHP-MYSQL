<?php
/**
 * Controlador Ropa
*/

class Ropa extends Controlador {

    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("ropaModelo");
    }

    function portada() {
        $sesion = new sesion();
        if ($sesion->getLogin()) {
            //leer productos bisuteria
            $data = $this->getRopa();

            $datos = [
                "titulo" => "Ropa",
                "activo"=>"ropa",
                "data" => $data,
                "menu" => true
            ];
            $this->vista("ropaVista", $datos);
        } else {
            header("location:".RUTAAPP);
        }
    }

    public function getRopa() {
        $data = [];
        $data = $this->modelo->getRopa();
        return $data;
    }

}

?>