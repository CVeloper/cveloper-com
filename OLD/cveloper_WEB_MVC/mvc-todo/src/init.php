<?php

function startsWith($haystack, $needle) {
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}

spl_autoload_register(
    function ($class) {
        $classPath = ROOT . DS . "src" . DS;
        if (startsWith($class, "Controller")) {
            $classPath .= "controller" . DS . $class;
        } else if (startsWith($class, "Model")) {
            $classPath .= "model" . DS . $class;
        } else {
            $classPath .= $class;
        }
        require("$classPath.php");
    }
);

require (ROOT . DS . "config" . DS . "config.php");

?>
