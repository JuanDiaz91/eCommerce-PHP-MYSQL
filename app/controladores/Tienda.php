<?php
/**
 * Controlador Tienda
*/

class Tienda extends Controlador {

    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("TiendaModelo");
    }

    function portada() {
        $sesion = new sesion();
        if ($sesion->getLogin()) {
            //leer productos mas vendidos
            $data = $this->getMasVendidos();

            //leer productos nuevos 
            $nuevos = $this->getNuevos();
            

            $datos = [
                "titulo" => "Bienvenid@ a la tienda solidaria de AFAJE",
                "data" => $data,
                "nuevos" => $nuevos,
                "menu" => true
            ];
            $this->vista("tiendaVista", $datos);
        } else {
            header("location:".RUTAAPP);
        }
    }

    function logout() {
        session_start();
        if (isset($_SESSION["usuario"])) {
            $sesion = new Sesion();
            $sesion->finalizarLogin();
        }
        header("location:".RUTAAPP);
    }

    public function getmasVendidos() {
        $data = [];
        require_once "AdmonProductos.php";
        $productos = new AdmonProductos();
        $data = $productos->getMasVendidos();
        unset($productos);
        return $data;
    }

    public function getNuevos() {
        $data = [];
        require_once "AdmonProductos.php";
        $productos = new AdmonProductos();
        $data = $productos->getNuevos();
        unset($productos);
        return $data;
    }
}

?>