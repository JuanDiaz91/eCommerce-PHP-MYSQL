<?php
/*Main maneja la URL y lanza los procesos el primer elemento es el controladorel segundo es el metodoel tercero son los parametros
*/
class Main{
    protected $controlador = "Login";
    protected $metodo = "portada";
    protected $parametros = [];

    function __construct() {
        $url = $this->separarURL();

        if($url != "" && file_exists("../app/controladores/".ucwords($url[0]).".php")){
            $this->controlador = ucwords($url[0]);
            unset($url[0]);
            
        }
        //Cargando la clase del controlador
        require_once("../app/controladores/".ucwords($this->controlador).".php");
        //Instanciamos la clase controlador
        $this->controlador = new $this->controlador;

        if (isset($url[1])) {
            if (method_exists($this->controlador, $url[1])) {
                $this->metodo = $url[1];
                unset($url[1]);
            }
        }
        //
        $this->parametros = $url ? array_values($url):[];
        call_user_func_array(
            [$this->controlador,$this->metodo],
            $this->parametros
        );
        

    }

    function separarURL() {
        $url = "";
        if(isset($_GET["url"])){
            //eliminamos el caracter final
            $url = rtrim($_GET["url"], "/");
            $url = rtrim($_GET["url"], "\\");
            //limpiamos caracteres no propios para la url
            $url = filter_var($url, FILTER_SANITIZE_URL);
            //separamos
            $url = explode("/",$url);
        }
        return $url;
    }
   
}
?>