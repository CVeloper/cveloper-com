<?php

class App
{
    private static $enrutador;
    private static $db;

    public static function getRouter() {
        return self::$enrutador;
    }

    public static function getDB() {
        return self::$db;
    }

    public static function initDB() {
        self::$db = new DB(Config::get('db.user'), Config::get('db.pass'), Config::get('db.name'));
    }

    public static function run($uri)
    {
        self::$enrutador = new Router($uri);
        self::initDB();

        $controlador = self::$enrutador->getControlador();
        $accion = self::$enrutador->getAccion();
        $params = self::$enrutador->getParams();

        $clase_controlador = "Controller" . ucfirst($controlador);

        $objeto_controlador = new $clase_controlador();

        if (method_exists($objeto_controlador, $accion)) {
            $salida = $objeto_controlador->procesaAccion($accion, $params);
        } else {
            throw new Exception("El método $accion no exsiste.");
        }
        echo $salida;
    }
}


?>
