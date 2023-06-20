<?php
/**
 * Controlador para productos
 */
class AdmonProductos extends Controlador {
    private $modelo;

    function __construct() {
        $this->modelo = $this->modelo("AdmonProductosModelo");
    }

    public function portada() {
        //creamos sesion
        $sesion = new Sesion();

        if ($sesion->getLogin()) {
            //Leemos los datos de la tabla
            $data = $this->modelo->getProductos();

            //Leemos las llaves de tipoProducto
            $llaves = $this->modelo->getLlaves("tipoProducto");
            
            //Vista portada
            $datos = [
                "titulo" => "Administrativo productos",
                "menu" => false,
                "admon" => true,
                "tipoProducto" => $llaves,
                "data" => $data
            ];
            $this->vista("admonProductosPortadaVista", $datos);

        } else {
            header("location:".RUTAAPP."admon");
        }
    }

    public function alta() {
        //definir arreglos
        $data = [];
        $errores = [];

        //leemos las llaves de tipoProducto
        $llaves = $this->modelo->getLlaves("tipoProducto");

        //Leemos los estatus del producto
        $statusProducto = $this->modelo->getLlaves("statusProducto");
        
        //Leemos el catalago de productos
        $catalogo = $this->modelo->getCatalogo();

        //Recibimos la informacion de la vista
        if($_SERVER['REQUEST_METHOD']=="POST") {
            //Recibimos la información = isset()?valor:valor2 => valor ?? valor2
            $id =trim($_POST['id'] ?? ""); //Si existe id es una modificación si no existe es un alta.
            //
            $tipo = $_POST['tipo'] ?? "";
            $nombre = Valida::cadena($_POST['nombre'] ?? "");
            $descripcion = Valida::cadena($_POST['content'] ?? "");
            $precio = Valida::numero($_POST['precio'] ?? "");
            $descuento = Valida::numero($_POST['descuento'] ?? "0");
            $envio = Valida::numero($_POST['envio'] ?? "0");

            $imagen = $_FILES['imagen']['name'];
            $imagen = Valida::archivo($imagen);
            //
            $fecha = $_POST['fecha'] ?? "";
            $relacion1 = $_POST['relacion1'] ?? "";
            $relacion2 = $_POST['relacion2'] ?? "";
            $relacion3 = $_POST['relacion3'] ?? "";
            //
            $masvendido = $_POST['masvendido'] ?? "";
            $nuevos = $_POST['nuevos'] ?? "";
            //Validamos los checkboxes
            $masvendido = ($masvendido=="")?"0":"1";
            $nuevos = ($nuevos=="")?"0":"1";

            $status = $_POST['status'] ?? "";
            //ropa
            $talla = $_POST['talla'] ?? "";
            $color = $_POST['color'] ?? "";

            //Validamos la información
            if(empty($nombre)) {
                array_push($errores,"El nombre es necesario");
            }
            
            if(empty($descripcion)) {
                array_push($errores,"La descripcion del producto es necesaria");
            }

            if(!is_numeric($precio)) {
                array_push($errores,"El precio del producto debe ser un número");
            }
            
            if(!is_numeric($envio)) {
                array_push($errores,"El coste del envío del producto debe ser un número");
            }

            if(!is_numeric($descuento)) {
                array_push($errores,"El descuento del producto debe ser un número");
            }    

            if($precio < $descuento) {
                array_push($errores,"El descuento no puede ser mayor que el precio del producto");
            }

            if(!Valida::fecha($fecha)) {
                array_push($errores,"El formato de la fecha es erroneo (AAA-MM-DD)");

            } else if(Valida::fechaDif($fecha)) {
                array_push($errores,"La fecha no puede ser mayor a la fecha actual");
            } 

            if ($tipo == 5 || $tipo == 6 || $tipo == 7 || $tipo == 8) {
                if(empty($talla)) {
                    array_push($errores,"La talla del producto es necesaria");
                }
    
                if(empty($color)) {
                    array_push($errores,"El color del producto es necesario");
                }
            } else if ($tipo == 1 || $tipo == 2 || $tipo == 3 || $tipo == 4){
                
            } else {
                array_push($errores, "Debes seleccionar un tipo de producto");
            }

            if (empty($imagen)) {

                array_push($errores, "Debes seleccionar una imagen del producto");

            }else if (Valida::archivoImagen($_FILES['imagen']['tmp_name'])) {
                //cambiar el nombre del archivo
                $imagen = Valida::archivo(html_entity_decode($nombre));
                $imagen = strtolower($imagen.".jpg");
    
                //Subir el archivo
                if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                    //copiamos archivo temporal
                    copy($_FILES['imagen']['tmp_name'], "img/".$imagen);
                    //Validar 240px
                    Valida::imagen($imagen,240);
                } else {
                    array_push($errores, "Error al subir archivo de imagen");
                }
            }  else {
                array_push($errores, "El formato de la imagen no es acceptado");
            }         

            //Crear array de datos
            $data = [
                "id" => $id,
                "tipo" => $tipo,
                "nombre" => $nombre,
                "descripcion" => $descripcion,
                "fecha" => $fecha,
                "talla" => $talla,
                "color" => $color,
                "precio" => $precio,
                "descuento" => $descuento,
                "envio" => $envio,
                "imagen" => $imagen,
                "masvendido" => $masvendido,
                "nuevos" => $nuevos,
                "status" => $status,
                "relacion1" => $relacion1,
                "relacion2" => $relacion2,
                "relacion3" => $relacion3
            ];


            if (empty($errores)) {

                //Enviamos al modelo
                if ($id=="") {
                    //Alta
                    if ($this->modelo->altaProducto($data)) {
                        header("location:".RUTAAPP."admonProductos");
                    }
                    
                } else {
                    //modificación
                    if ($this->modelo->modificaProducto($data)) {
                        header("location:".RUTAAPP."admonProductos");
                    }

                }
            }
        }   

        //vista alta
        $datos = [
            "titulo" => "Administrativo productos alta",
            "subtitulo" => "Alta de producto",
            "menu" => false,
            "admon" => true,
            "errores" => $errores,
            "tipoProducto" => $llaves,
            "statusProducto" => $statusProducto,
            "catalogo" => $catalogo,
            "data" => $data
        ];
        $this->vista("admonProductosAltaVista", $datos);
    }
    
    public function baja($id="") {
        //leemos las llaves de tipoProducto
        $llaves = $this->modelo->getLlaves("tipoProducto");

        //Leemos los estatus del producto
        $statusProducto = $this->modelo->getLlaves("statusProducto");
                        
        //Leemos el catalago de productos
        $catalogo = $this->modelo->getCatalogo();
        
        //Leemos los datos del registro del id
        $data = $this->modelo->getProductoId($id);
        
        //vista alta
        $datos = [
            "titulo" => "Administrativo productos Baja",
            "subtitulo" => "Baja de producto",
            "menu" => false,
            "admon" => true,
            "errores" => [],
            "tipoProducto" => $llaves,
            "statusProducto" => $statusProducto,
            "catalogo" => $catalogo,
            "data" => $data,
            "baja" => true
        ];
        $this->vista("admonProductosAltaVista", $datos);
        
    }

    public function bajaLogica($id="") {
        if (isset($id)) {
            if ($this->modelo->bajaLogica($id)) {
                header("location:".RUTAAPP."admonProductos");
            }
        }
    }

    public function cambio($id="") {
        //leemos las llaves de tipoProducto
        $llaves = $this->modelo->getLlaves("tipoProducto");

        //Leemos los estatus del producto
        $statusProducto = $this->modelo->getLlaves("statusProducto");
                
        //Leemos el catalago de productos
        $catalogo = $this->modelo->getCatalogo();

        //Leemos los datos del registro del id
        $data = $this->modelo->getProductoId($id);

        //vista alta
        $datos = [
            "titulo" => "Administrativo productos Modificar",
            "subtitulo" => "Modificación de producto",
            "menu" => false,
            "admon" => true,
            "errores" => [],
            "tipoProducto" => $llaves,
            "statusProducto" => $statusProducto,
            "catalogo" => $catalogo,
            "data" => $data
        ];
        $this->vista("admonProductosAltaVista", $datos);
    }

    public function getMasVendidos() {

        return $this->modelo->getMasVendidos();
    
    }

    public function getNuevos() {

        return $this->modelo->getNuevos();
    
    }

    public function producto($id='',$volver="") {

        $data = $this->modelo->getProductoId($id);
        //
        //Enviamos id del usuario
        $sesion = new Sesion();
        $idUsuario = $_SESSION["usuario"]["id"];
        //vista alta
        $datos = [
            "titulo" => "Productos",
            "subtitulo" => $data["nombre"],
            "menu" => true,
            "admon" => false,
            "volver"=> $volver, 
            "idUsuario" => $idUsuario,
            "errores" => [],
            "data" => $data
        ];
        $this->vista("productosVista", $datos);


    }
    

}

?>