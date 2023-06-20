<?php
/**
 *  Administrador Modelo
 */

class AdmonModelo {
    private $db;

    function __construct() {
        $this -> db = new MySQLdb();
    }

    function verificarContraseña($data) {
        //Declaramos el arreglo
        $errores = [];

        //Encriptar
        $contraseña = hash_hmac("sha512", $data['contraseña'], LLAVE);

        //Enviamos el query
        $sql = "SELECT id, contraseña, status, baja FROM admon WHERE correo='".$data['usuario']."'";
        $data = $this->db->query($sql);

        //validación
        if (empty($data)) {
            array_push($errores, "No existe el usuario");
        } else if ($contraseña!=$data['contraseña']) {
            array_push($errores, "La contraseña no es correcta");
        } else if ($data['status']==0) {
            array_push($errores, "Él usuario está desactivado");
        } else if ($data['baja']==1) {
            array_push($errores, "Él usuario está dado de baja");
        } else if (count($data)>4) {
            array_push($errores, "El email está duplicado");
        } else {
            $sql = "UPDATE admon SET login_dt=NOW() WHERE id=".$data['id'];
            if (!$this->db->queryNoSelect($sql)) {
                array_push($errores, "Error al modificar la fecha del último acceso.");
            }
        }

        //Regresamos los errores
        return $errores;
    }
}

?>