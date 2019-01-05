<?php

require_once("../config/testConfig.php");
require_once("../resources/loremIpsum.php");
require_once("../resources/technologies.php");

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
    $manejador = fopen(TEST_DEVELOPERS, 'w') or die('Error al abrir el fichero.');
    $datos = "\n/* ####################################################### DELETE DEVELOPERS */\n\n"
           . "DELETE FROM developer WHERE id_developer != 1;\n"
           . "ALTER TABLE developer AUTO_INCREMENT = 2;\n"
           . "\n/* ####################################################### RANDOM DEVELOPERS */\n";
    fwrite($manejador, $datos);
    fclose($manejador);
    filasDeveloper(NUM_DEVELOPERS, $textoAleatorio, TEST_DEVELOPERS);
    filasDeveloperTech(NUM_DEVELOPERS, $tecnologias, MAX_TECHNOLOGIES, NUM_LEVELS, TEST_DEVELOPERS);
}

generarFilasAleatorias($tech, $lorem);

?>
