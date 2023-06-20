<?php
/**
 *  Modelo Usuarios Admon
 */
class AdmonUsuariosModelo {
    private $db;

    function __construct() {

        $this->db = new MySQLdb();
    }

    function insertarDatos($data) {
        $contraseña = hash_hmac("sha512", $data["contraseña1"], LLAVE);
        $sql = "INSERT INTO admon VALUES(0,";
        $sql.= "'".$data['nombre']."', ";
        $sql.= "'".$data['usuario']."', ";
        $sql.= "'".$contraseña."', ";
        $sql.= "1, ";// status
        $sql.= "0, ";// baja
        $sql.= "'', ";// Fecha de la ultima sesión
        $sql.= "'', ";// Fecha de baja
        $sql.= "'', ";// Fecha de modificacion
        $sql.= "(NOW()))";// Fecha de creación
        return $this->db->queryNoSelect($sql);
    }

    function getUsuarios() {
        $sql = "SELECT * FROM admon WHERE baja=0";
        $data = $this->db->querySelect($sql);
        return $data;
    }
    
    function getLlaves($tipo) {
        $sql = "SELECT * FROM llaves WHERE tipo='".$tipo."' ORDER BY indice DESC";
        $data = $this->db->querySelect($sql);
        return $data;
    }

    function getUsuarioId($id) {
        $sql = "SELECT * FROM admon WHERE id=".$id;
        $data = $this->db->query($sql);
        return $data;
    }

    function bajaLogica($id) {
        $errores = [];
        $sql = "UPDATE admon SET baja=1, baja_dt=(NOW()) WHERE id=".$id;
        if (!$this->db->queryNoSelect($sql)) {
            array_push($errores, "Error al modificar el registro de baja");
        }
        return $data;
    }


    function modificaUsuario($data) {
        $errores = array();
        $sql = "UPDATE admon SET ";
        $sql.= "correo='".$data["correo"]."', ";
        $sql.= "nombre='".$data["nombre"]."', ";
        $sql.= "modificado_dt=(NOW()), ";
        $sql.= "status=".$data["status"];
        if (!empty($data['contraseña1'] && !empty($data['contraseña2']))) {
            $contraseña = hash_hmac("sha512", $data["contraseña1"], LLAVE);
            $sql.= ", contraseña='".$contraseña."'";
        }
        $sql.=" WHERE id=".$data["id"];
        if (!$this->db->queryNoSelect($sql)) {
            array_push($errores,"Existió un error al actualizar el registro.");
        }
        return $errores;
    }
}
?>