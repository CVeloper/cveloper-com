<?php

// Número Total de Desarrolladores para probar las consultas complejas a la Base de Datos
define('NUM_DEVELOPERS', 100);
// Valores de Prueba: 1, 10, 100, 1.000, 10.000, 100.000 y 1.000.000

// Número Máximo de Tecnologías que va a tener un desarrollador en su curriculum
define('MAX_TECHNOLOGIES', 5);
// Valores de Prueba: 1, 2, 5, 10, 15, 20 y 30

// Número de Niveles de Destreza que puede elegir un Desarrollador para cada Tecnología
define('NUM_LEVELS', 10);
// Valores de Prueba: 3, 5 y 10 (de muy básico a gurú ninja)

// Número Máximo de Tecnologías que se van a ordenar por preferencia en las búsquedas
define('MAX_PREFERENCES', 3);
// Valores de Prueba: 1, 2, 3, 4, 5, 10 y 20

// Archivo donde se van a almacenar los registros generados aleatoriamente
define('TEST_INSERTS', "../resources/testInserts.sql");
// OJO! Tener en cuenta que este fichero se llamará desde la carpeta 'src'

?>
