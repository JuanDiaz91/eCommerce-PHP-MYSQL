<?php
/**
 * Login Modelo 
 */
class LoginModelo {
    private $db;

    function __construct()
    {
        $this->db = new MySQLdb();
    }

    function insertarRegistro($data) {
        $resultado = false;
        if ($this->validarCorreo($data["email"])) {
           $contraseña = hash_hmac("sha512", $data["contraseña1"], "afaje2023");
           $sql = "INSERT INTO usuarios VALUES(0,"; 
           $sql.="'".$data["nombre"]."', ";
           $sql.="'".$data["primerApellido"]."', ";
           $sql.="'".$data["segundoApellido"]."', ";
           $sql.="'".$data["email"]."', ";
           $sql.="'".$data["direccion"]."', ";
           $sql.="'".$data["ciudad"]."', ";
           $sql.="'".$data["provincia"]."', ";
           $sql.="'".$data["codpos"]."', ";
           $sql.="'".$data["pais"]."', ";
           $sql.="'".$contraseña."')";
           $resultado = $this->db->queryNoSelect($sql);
        }
        return $resultado;
    }

    function cambiarContraseñaAcceso($id, $contraseña){
        $resultado = false;
        $contraseña = hash_hmac("sha512", $contraseña, "afaje2023");
        $sql = "UPDATE usuarios SET ";
        $sql.= "contraseña='".$contraseña."' ";
        $sql.= "WHERE id =".$id;
        $resultado = $this->db->queryNoSelect($sql);
        return $resultado;
      }

    function validarCorreo($email) {
        $sql = "SELECT * FROM usuarios WHERE email='".$email."'";
        $data = $this->db->query($sql);
        return (count($data)==0)?true:false;
    }

    function getUsuarioCorreo($email) {
        $sql = "SELECT * FROM usuarios WHERE email='".$email."'";
        $data = $this->db->query($sql);
        return $data;
    }

    function enviarCorreo($email) {
        $data = $this->getUsuarioCorreo($email);
        $id = $data["id"];
        $nombre = $data["nombre"]." ".$data["primerApellido"]." ".$data["segundoApellido"];
        $mensaje = $nombre.", entra al siguiente enlace para cambiar su contraseña <br>";
        $mensaje ="<a href='".RUTAAPP."/login/cambiaclave/".$id."'>Cambia tú contraseña</a>";

        $headers = "MIME-Version: 10\r\n";
        $headers = "Content-type:text/html; charset=UTF-8\r\n";
        $headers = "From: AFAJE\r\n";
        $headers = "Replay-to: $email\r\n";

        $asunto = "Cambiar clave de acceso";

        return @mail($email, $asunto, $mensaje, $headers);
    }

    function verificar($usuario, $contraseña) {
        $errores = [];
        $sql = "SELECT * FROM usuarios WHERE email='".$usuario."'";
        $contraseña = hash_hmac("sha512", $contraseña, "afaje2023");
        $contraseña = substr($contraseña,0,200);
        //consulta
        $data = $this->db->query($sql);
        //validacion
        if(empty($data)) {
            array_push($errores, "No existe ese usuario, por favor verifíquelo");
        } else if($contraseña!=$data["contraseña"]) {
            array_push($errores, "Clave de acceso erronea, por favor verifíquela");
        }
        return $errores;
    }

}
?>