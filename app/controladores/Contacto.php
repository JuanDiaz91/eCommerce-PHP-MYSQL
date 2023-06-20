<?php
/**
 * Controlador Contacto
*/

class Contacto extends Controlador {

    private $modelo;

    function portada() {
        $sesion = new sesion();
        if ($sesion->getLogin()) {
            $datos = [
                "titulo" => "Contacto",
                "activo" => "contacto",
                "menu" => true
            ];
            $this->vista("contactoVista", $datos);
        } else {
            header("location:".RUTAAPP);
        }
    }

}

?>