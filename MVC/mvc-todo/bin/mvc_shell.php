<?php

define('DS', DIRECTORY_SEPARATOR);

define('ROOT', dirname(dirname(__FILE__)));

define('VIEW_ROOT', ROOT . DS . "resources" . DS);

require (ROOT . DS . "src" . DS . "init.php");

App::initDB();

?>
