<?php
/**
 * Controlador Carrito
*/

class Carrito extends Controlador {

    private $modelo;

    function __construct()
    {
        $this->modelo = $this->modelo("CarritoModelo");
    }

    function portada($errores=[]) {
        $sesion = new sesion();
        if ($sesion->getLogin()) {

            $idUsuario = $_SESSION["usuario"]["id"];

            $data = $this->modelo->getCarrito($idUsuario);
            
            $datos = [
                "titulo" => "Carrito",
                "data" => $data,
                "idUsuario" => $idUsuario,
                "errores" => $errores,
                "menu" => true
            ];
            $this->vista("carritoVista", $datos);
        } else {
            header("location:".RUTAAPP);
        }
    }

    public function agregaProducto($idProducto, $idUsuario) {

        $errores = [];
        if ($this->modelo->verificaProducto($idProducto, $idUsuario)==false) {
            //Añadir registro
            if ($this->modelo->agregaProducto($idProducto, $idUsuario)==false) {
                array_push($errores,"Error al insertar producto al carrito");
            }
        }
        //Portada
        $this->portada($errores);
    }

    public function actualiza() {

        if (isset($_POST["numero"]) && isset($_POST["idUsuario"])) {
            $errores = [];
            $numero = $_POST["numero"];
            $idUsuario = $_POST["idUsuario"];
            
            for ($i=0; $i<$numero; $i++) {
                $idProducto = $_POST["i".$i];
                $cantidad = $_POST["c".$i];

                if (!$this->modelo->actualiza($idUsuario, $idProducto, $cantidad)) {

                    array_push($errores,"Error al actualizar el producto ".$idProducto);
                }
            }
            $this->portada($errores);
        }
    }

    public function borrar($idProducto, $idUsuario) {

        $errores = [];
        if (!$this->modelo->borrar($idProducto, $idUsuario)) {
            array_push($errores, "Error al borrar los productos del carrito");
        }
        $this->portada($errores);
    }

    public function checkout() {

        $sesion = new Sesion();
        if ($sesion->getLogin()) {
            
            $data = $_SESSION["usuario"];
            $datos = [
                "titulo" => "carrito | Datos de envío",
                "data" => $data,
                "menu" => true
            ];
            $this->vista("datosEnvioVista", $datos);

        } else {
            $datos = [
                "titulo" => "carrito | Checkout",
                "menu" => true
            ];
            $this->vista("checkoutVista", $datos);
        }
    }

    public function formaPago() {

        $datos = [
            "titulo" => "carrito | Forma de pago",
            "menu" => true
        ];
        $this->vista("formaPagoVista", $datos);

    }

    public function verificar() {

        $sesion = new sesion();

        $idUsuario = $_SESSION["usuario"]["id"];

        $carrito = $this->modelo->getCarrito($idUsuario);

        $pago = $_POST["pago"]??"";
        $data = $_SESSION["usuario"];

        $datos = [
            "titulo" => "carrito | Verificar datos",
            "pago" => $pago,
            "data" => $data,
            "carrito" => $carrito,
            "menu" => true
        ];
        $this->vista("verificarVista", $datos);
        
    }
    
    public function gracias() {
        
        $sesion = new Sesion();
        $data = $_SESSION["usuario"];
        $idUsuario = $_SESSION["usuario"]["id"];

        if ($carrito = $this->modelo->cierraCarrito($idUsuario,1)) {

            $datos = [
                "titulo" => "carrito | Gracias por su compra!",
                "data" => $data,
                "menu" => true
            ];
            $this->vista("graciasVista", $datos);

        } else {

            $datos = ["titulo" => "Error en la actualización del carrito", 
                "menu" => true, 
                "errores" => [],
                "data" => [],
                "subtitulo" =>"Error en la actualización del carrito", 
                "texto"=> "Hubo un problema al actualizar el estado del carrito. Por favor intentelo más tarde.",
                "color"=>"alert-danger",
                "url"=> "tienda",
                "colorBoton"=>"btn-danger",
                "textoBoton"=>"Volver"
            ];
            $this->vista("mensajeVista",$datos);

        }

    }

    public function ventas() {

        $data = $this->modelo->ventas();

        $datos = [
            "titulo" => "Ventas",
            "data" => $data,
            "menu" => false,
            "admon" => true
        ];
        $this->vista("admonVentasVista", $datos);
    }

    public function detalles($fecha, $idUsuario) {

        $data = $this->modelo->detalles($fecha, $idUsuario);

        $datos = [
            "titulo" => "Ventas Detalles",
            "data" => $data,
            "menu" => false,
            "admon" => true
        ];
        $this->vista("admonVentasDetallesVista", $datos);

    }
    
    public function grafica() {
        
        $data = $this->modelo->ventasDia();

        $datos = [
            "titulo" => "Ventas por día",
            "data" => $data,
            "menu" => false,
            "admon" => true
        ];
        $this->vista("admonVentasGraficaVista", $datos);
    
    }
}
?>