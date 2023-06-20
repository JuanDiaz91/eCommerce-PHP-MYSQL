<?php
/**
 * Bisuteria Modelo 
 */
class BisuteriaModelo {
    private $db;

    function __construct()
    {
        $this->db = new MySQLdb();
    }

    function getBisuteria() {
        $sql = "SELECT * FROM productos WHERE baja=0 AND tipo=1";
        $data = $this->db->querySelect($sql);
        return $data;
    }


}
?>