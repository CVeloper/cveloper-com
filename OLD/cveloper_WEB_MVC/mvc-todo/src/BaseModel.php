<?php

class BaseModel
{
    protected $db;

    function __construct()
    {
        $this->db = App::getDB();
    }
}


?>
