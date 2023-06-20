<?php
/**
 * Sombreros Modelo 
 */
class SombrerosModelo {
    private $db;

    function __construct()
    {
        $this->db = new MySQLdb();
    }

    function getSombreros() {
        $sql = "SELECT * FROM productos WHERE baja=0 AND tipo=4";
        $data = $this->db->querySelect($sql);
        return $data;
    }

}
?>