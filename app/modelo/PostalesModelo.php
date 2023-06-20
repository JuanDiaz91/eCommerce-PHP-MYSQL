<?php
/**
 * Postales Modelo 
 */
class PostalesModelo {
    private $db;

    function __construct()
    {
        $this->db = new MySQLdb();
    }

    function getPostales() {
        $sql = "SELECT * FROM productos WHERE baja=0 AND tipo=3";
        $data = $this->db->querySelect($sql);
        return $data;
    }


}
?>