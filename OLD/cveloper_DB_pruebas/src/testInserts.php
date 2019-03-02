<?php

require_once("../config/testConfig.php");
require_once("../resources/loremIpsum.php");
require_once("../resources/technologies.php");

function filasTechnology($tecnologias, $fichero) {
    $manejador = fopen($fichero, 'a') or die('Error al abrir el fichero.');
    $datos = "\n/* ####################################################### technology */\n\n";
    foreach ($tecnologias as $nombre) {
        $datos .= "INSERT INTO technology (tech_name) VALUES ('$nombre');\n";
    }
    fwrite($manejador, $datos);
    fclose($manejador);
}

function filasSearchTech($tecnologias, $numeroPreferencias, $fichero) {
    $manejador = fopen($fichero, 'a') or die('Error al abrir el fichero.');
    $datos = "\n/* ####################################################### search_tech */\n\n";
    $maximoIdTecnologia = count($tecnologias);

    $arrayTecnologias = [];
    while (count($arrayTecnologias) < $numeroPreferencias) {
        $idTecnologia = mt_rand(1, $maximoIdTecnologia);
        if( !in_array($idTecnologia, $arrayTecnologias) ) {
          array_push($arrayTecnologias, $idTecnologia);
        }
    }
    foreach ($arrayTecnologias as $indice => $id) {
        $preferencia = $indice + 1;
        $datos .= "INSERT INTO search_tech (id_search, preference, id_technology) VALUES (1, $preferencia, $id);\n";
    }
    fwrite($manejador, $datos);
    fclose($manejador);
}

function arrayPalabras($texto) {
    $palabras = explode(" ", strtolower(str_replace([".", ","], "", $texto)));
    return $palabras;
}

function aliasAleatorio($palabras) {
    $indiceMaximo = count($palabras) - 1;
    $alias = "";
    for ($i = 0; $i < 3; $i++) {
        $alias .= $palabras[mt_rand(0, $indiceMaximo)];
    }
    return $alias;
}

function filasDeveloper($numeroDesarrolladores, $texto, $fichero) {
    $manejador = fopen($fichero, 'a') or die('Error al abrir el fichero.');
    $datos = "\n/* ####################################################### developer */\n\n";
    $palabras = arrayPalabras($texto);
    for ($i = 0; $i < $numeroDesarrolladores; $i++) {
        $alias = aliasAleatorio($palabras);
        $datos .= "INSERT INTO developer (alias) VALUES ('$alias');\n";
    }
    fwrite($manejador, $datos);
    fclose($manejador);
}

function filasDeveloperTech($numeroDesarrolladores, $tecnologias, $maximoTecnologias, $maximoNivel, $fichero) {
    $manejador = fopen($fichero, 'a') or die('Error al abrir el fichero.');
    $datos = "\n/* ####################################################### developer_tech */\n\n";
    $maximoIdTecnologia = count($tecnologias);
    for ($i = 2; $i <= $numeroDesarrolladores + 1; $i++) {
        $numeroTecnologias = mt_rand(1, $maximoTecnologias);
        $arrayTecnologias = [];
        while (count($arrayTecnologias) < $numeroTecnologias) {
            $idTecnologia = mt_rand(1, $maximoIdTecnologia);
            if( !in_array($idTecnologia, $arrayTecnologias) ) {
              array_push($arrayTecnologias, $idTecnologia);
            }
        }
        foreach ($arrayTecnologias as $id) {
            $nivel = mt_rand(1, $maximoNivel);
            $datos .= "INSERT INTO developer_tech (id_developer, id_technology, level) VALUES ($i, $id, $nivel);\n";
        }
    }
    fwrite($manejador, $datos);
    fclose($manejador);
}

function generarFilasAleatorias($tecnologias, $textoAleatorio) {
    $manejador = fopen(TEST_INSERTS, 'w') or die('Error al abrir el fichero.');
    $datos = "\n/* ####################################################### RANDOM INSERTS */\n";
    fwrite($manejador, $datos);
    fclose($manejador);
    filasTechnology($tecnologias, TEST_INSERTS);
    filasSearchTech($tecnologias, MAX_PREFERENCES, TEST_INSERTS);
    filasDeveloper(NUM_DEVELOPERS, $textoAleatorio, TEST_INSERTS);
    filasDeveloperTech(NUM_DEVELOPERS, $tecnologias, MAX_TECHNOLOGIES, NUM_LEVELS, TEST_INSERTS);
}

generarFilasAleatorias($tech, $lorem);

?>
