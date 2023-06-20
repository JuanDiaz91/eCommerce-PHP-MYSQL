<?php
/**
 * Controlador Bisuteria
*/

class Bisuteria extends Controlador {

    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("bisuteriaModelo");
    }

    function portada() {
        $sesion = new sesion();
        if ($sesion->getLogin()) {
            //leer productos bisuteria
            $data = $this->getBisuteria();

            $datos = [
                "titulo" => "Bisutería",
                "activo"=>"bisuteria",
                "data" => $data,
                "menu" => true
            ];
            $this->vista("bisuteriaVista", $datos);
        } else {
            header("location:".RUTAAPP);
        }
    }

    public function getBisuteria() {
        $data = [];
        $data = $this->modelo->getBisuteria();
        return $data;
    }

}

?>