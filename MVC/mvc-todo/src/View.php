<?php

class View
{
    private $template;

    public function __construct() {
        $enrutador = App::getRouter();
        $this->template = VIEW_ROOT .
                          $enrutador->getControlador() . DS .
                          $enrutador->getAccion() . '.phtml';
        if (!file_exists($this->template)) {
            throw new Exception("Error: template no encontrado.");
        }
    }

    public function renderContenido($data = []) {
        ob_start(); // todas las salidas echo se quedan en el buffer
        include($this->template);
        $html_content = ob_get_clean(); // recupera todo el output buffer
        return $html_content;
    }

    public function render($data = []) {
        $html = $this->renderContenido($data);
        $data = [];
        $data['contenido'] = $html;
        $data['titulo'] = Config::get('site.name');
        ob_start(); // todas las salidas echo se quedan en el output buffer
        include(VIEW_ROOT . 'base.phtml');
        $html_content = ob_get_clean(); // recupera todo el output buffer
        return $html_content;
    }

}

?>
