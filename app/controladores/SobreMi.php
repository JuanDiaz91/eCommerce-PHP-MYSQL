<?php
/**
 * Controlador SobreMi
*/

class SobreMi extends Controlador {

    private $modelo;

    function portada() {
        $sesion = new sesion();
        if ($sesion->getLogin()) {
            $datos = [
                "titulo" => "¿Quienes somos?",
                "activo" => "sobremi",
                "menu" => true
            ];
            $this->vista("sobremiVista", $datos);
        } else {
            header("location:".RUTAAPP);
        }
    }

}

?>