<?php
/*Manejo de la base de datos*/

class MySQLdb{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "cambalache";
    private $conn;

    function __construct() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);

        if (mysqli_connect_errno()) {
            die("<br> Error en la conexion en la base de datos: ". mysqli_connect_errno());
            exit();
        }else {
            //echo "conexion establecida"."<br>";
        }
        if (!mysqli_set_charset($this->conn, "utf8")) {
            printf("Error en la conversión de caracteress %s",
            mysqli_connect_error());
            exit();
          } else {
            //print "El conjunto de caracteres es: ".mysqli_character_set_name($this->conn)."<br>";
          }
    }//fin contructor

    //Regresa un solo registro en un arreglo asociado
    function query($sql){
        $data = array();
        $resultado = mysqli_query($this->conn, $sql);
        if ($resultado) {
            if(mysqli_num_rows($resultado)>0){
            $data = mysqli_fetch_assoc($resultado);
            }
        }
        return $data;
    }

    function querySelect($sql){
        $data = array();
        $resultado = mysqli_query($this->conn, $sql);
        if ($resultado) {
            while($row = mysqli_fetch_assoc($resultado)){
                array_push($data, $row);
            }
        }
        return $data;
    }
    //Query regresa un valor booleano
    function queryNoSelect($sql){
        $resultado = mysqli_query($this->conn, $sql);
        return $resultado;
    }

    public function cerrar() {

        mysqli_close($this->conn);
    }
}

?>