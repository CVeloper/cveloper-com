<?php

class ControllerNumeros extends BaseController
{

    public function aleatorios($cantidad = 10) {
        $this->data = ModelNumeros::getAleatorios($cantidad);
    }

}

?>
