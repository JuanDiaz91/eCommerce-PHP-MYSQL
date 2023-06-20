<?php
/**
 * Buscar Modelo 
 */
class BuscarModelo {
    private $db;

    function __construct()
    {
        $this->db = new MySQLdb();
    }

    public function getProductosBuscar($buscar) {
        $sql = "SELECT * FROM productos WHERE ";
        $sql.="nombre LIKE '%".$buscar."%' OR ";
        $sql.="descripcion LIKE '%".$buscar."%'";
        print $sql;
        //
        $data = $this->db->querySelect($sql);
        return $data;
    }
}
?>