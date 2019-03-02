<?php

class DB
{
    private $db_PDO;

    // $db_user = "prueba", $db_pass = "prueba", $db_name = "prueba"
    // require('DB.php');
    // $database = new DB('prueba','prueba','prueba');

    public function __construct($db_user, $db_pass, $db_name, $db_type='mysql', $db_host='localhost')
    {
        try {
            $this->db_PDO = new PDO("$db_type:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        } catch (PDOException $e) {
            print "ERROR: " . $e->getMessage() . "<br>";
            die();
        }
    }

    public function getLastId() {
        return $this->connection->lastInsertId();
    }

    public function getConnection()
    {
        return $this->db_PDO;
    }

    public function ejecutar($sql, ...$params)
    {
        if (!$this->getConnection()) {
            return false;
        }
        try {
            $sentenciaSQL = $this->db_PDO->prepare($sql);
            $sentenciaEjecutada = $sentenciaSQL->execute($params);
            if (!$sentenciaEjecutada) {
                echo $this->db_PDO->errorInfo();
                return null;
            }
            $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (PDOException $e) {
            print "ERROR: " . $e->getMessage() . "<br>";
            return false;
        }
    }

    public function __destruct()
    {
        $this->db_PDO = null;
    }

}

?>
