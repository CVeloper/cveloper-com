<?php

// ORM: Object Relational Mapping (herramienta de los frameworks para DBs)

class ModelNoticias extends BaseModel
{

    private $id;
    private $titulo;
    private $texto;
    private $fecha;

    public function getTitulo() {
        return $this->titulo;
    }

    public function getTexto() {
        return $this->texto;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setTexto($texto) {
        $this->texto = $texto;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function save() {
        if ($this->id == null) {
            $resultado = $this->db->ejecutar("INSERT INTO noticias (titulo, texto, fecha) VALUES (?, ?, ?)", $this->titulo, $this->texto, $this->fecha);
            if (is_array($resultado)) {
                $this->id = $this->db->getLastId();
                return [$this->id];
            }
        } else {
            return $this->db->ejecutar("UPDATE noticias SET titulo = ?, texto = ?, fecha = ? WHERE id = ?", $this->titulo, $this->texto, $this->fecha, $this->id);
        }
    }

}

?>
