<?php
/**
 * Láminas Modelo 
 */
class LaminasModelo {
    private $db;

    function __construct()
    {
        $this->db = new MySQLdb();
    }

    function getLaminas() {
        $sql = "SELECT * FROM productos WHERE baja=0 AND tipo=2";
        $data = $this->db->querySelect($sql);
        return $data;
    }


}
?>