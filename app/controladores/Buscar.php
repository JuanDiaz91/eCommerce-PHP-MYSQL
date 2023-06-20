<?php
/**
 * Controlador Buscar
*/

class Buscar extends Controlador {

    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("BuscarModelo");
    }

    function portada() {
    }

    public function producto() {
        $buscar = $_POST["buscar"]??"";
        if (!empty($buscar)) {
            //buscar artículos
            $data = $this->modelo->getProductosBuscar($buscar);
            if (count($data)==0) {
                $datos = [
                    "titulo" => "No hay ningún artículo",
                    "menu" => true,
                    "errores" => [],
                    "data" => [],
                    "subtitulo" => "No hay artículos",
                    "texto" => "No hay artículos '".$buscar."'.",
                    "color" => "alert-danger",
                    "url" => "tienda",
                    "colorBoton" => "btn-danger",
                    "textoBoton" => "Volver"
                ];
                $this->vista("mensajeVista", $datos);
            } else {
                $datos = [
                    "titulo" => "Búsqueda de productos",
                    "data" => $data,
                    "menu" => true
                ];
                $this->vista("buscarVista", $datos);
            }
        } else {
            header("location:".RUTAAPP);
            
        }


    }
}

?>