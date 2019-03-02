<?php

// para que funcione en linux '/' y en windows '\'
define('DS', DIRECTORY_SEPARATOR);

// la raiz de nuestra aplicación desde este archivo
define('ROOT', dirname(dirname(__FILE__)));

// la carpeta donde van a estar las vistas
define('VIEW_ROOT', ROOT . DS . "resources" . DS);

require (ROOT . DS . "src" . DS . "init.php");

echo Config::get('site.name');

echo "<br>";

echo ROOT;

echo "<br>";

echo __FILE__;

echo "<br>";

// mvc-todo.io/noticias/listado/tag/tecnologia/?pagina=2
echo $_SERVER['REQUEST_URI'];
// /noticias/listado/tag/tecnologia/?pagina=2

$enrutador = new Router($_SERVER['REQUEST_URI']);
print_r($enrutador);

App::run($_SERVER['REQUEST_URI']);

?>
