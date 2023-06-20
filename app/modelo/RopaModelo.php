<?php
/**
 * Ropa Modelo 
 */
class RopaModelo {
    private $db;

    function __construct()
    {
        $this->db = new MySQLdb();
    }

    function getRopa() {
        $sql = "SELECT * FROM productos WHERE baja=0 AND tipo>=5";
        $data = $this->db->querySelect($sql);
        return $data;
    }

}
?>