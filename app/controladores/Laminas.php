<?php
/**
 * Controlador Laminas
*/

class Laminas extends Controlador {

    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("laminasModelo");
    }

    function portada() {
        $sesion = new sesion();
        if ($sesion->getLogin()) {
            //leer productos bisuteria
            $data = $this->getLaminas();

            $datos = [
                "titulo" => "Láminas",
                "activo"=>"laminas",
                "data" => $data,
                "menu" => true
            ];
            $this->vista("laminasVista", $datos);
        } else {
            header("location:".RUTAAPP);
        }
    }

    public function getLaminas() {
        $data = [];
        $data = $this->modelo->getLaminas();
        return $data;
    }

}

?>