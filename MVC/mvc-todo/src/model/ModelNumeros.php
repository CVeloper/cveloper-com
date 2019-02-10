<?php

// ORM: Object Relational Mapping (herramienta de los frameworks para DBs)

class ModelNumeros extends BaseModel
{

    static function getAleatorios($numero) {
        $aleatorios = [];
        for ($i = 0; $i < $numero; $i++) {
            $aleatorios[] = mt_rand(0, 1000);
        }
        return $aleatorios;
    }

}

?>
