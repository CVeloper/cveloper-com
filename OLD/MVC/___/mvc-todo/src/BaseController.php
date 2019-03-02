<?php

class BaseController
{
    protected $data;

    public function __construct() {
        $this->data = [];
    }

    public function procesaAccion($metodo, $parametros) {
        $this->$metodo(...$parametros);
        $vista = new View();
        return $vista->render($this->data);
    }
}

?>
