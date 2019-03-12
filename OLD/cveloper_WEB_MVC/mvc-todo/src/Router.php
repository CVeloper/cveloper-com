<?php

class Router
{
    private $uri;
    private $controlador;
    private $accion;
    private $params;

    public function getUri() {
        return $this->uri;
    }
    public function getControlador() {
        return $this->controlador;
    }
    public function getAccion() {
        return $this->accion;
    }
    public function getParams() {
        return $this->params;
    }

    public function __construct($uri) {
        // uri = /control/accion
        // uri = /control/accion/
        // uri = /control/accion?var=0
        // uri = /control/accion/?var=0
        // uri = /control/accion/param
        // uri = /control/accion/param/
        // uri = /control/accion/param?var=0
        // uri = /control/accion/param/?var=0
        // uri = /control/accion/param1/param2/param3
        // uri = /control/accion/param1/param2/param3/
        // uri = /control/accion/param/?var=0
        // uri = /control/accion/param/?var1=0&var2=true&var3=hola

        $this->uri = $uri;

        if ($uri == "/") {
            $this->redirect(Config::get("ruta.defecto"));
        }

        $url_separada = explode('?', $uri);
        $url_procesada = trim($url_separada[0], '/');

        $url_partes = explode('/', $url_procesada);

        if (count($url_partes) != 0) {
            // obtener controlador si lo hay
            if (current($url_partes)) {
                $this->controlador = array_shift($url_partes);
            }
            // obtener accion si la hay
            if (current($url_partes)) {
                $this->accion = array_shift($url_partes);
            }
            // parametros si los hay o array vacío
            $this->params = $url_partes;
        }
        // de esta url web:
        // mvc-todo.io/noticias/listado/tag/tecnologia/web/?pagina=2
        // obtenemos esto:
        // [uri] => /noticias/listado/tag/tecnologia/web/?pagina=2
        // [controlador] => noticias
        // [accion] => listado
        // [params] => Array (
        //                     [0] => tag
        //                     [1] => tecnologia
        //                     [2] => web
        //                   )
    }

    public function redirect($url) {
        header ("Location: $url");
        die();
    }
}

?>
