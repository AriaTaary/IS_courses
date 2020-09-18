<?php


namespace app\database;


use base\database\Table;

class ProfessorsTable extends Table
{
    public function __construct($dbname = "default")
    {
        parent::__construct($dbname);

        $this->tableName = "professors";
    }

    public function search($s)
    {
        $sql =
            "SELECT * FROM {$this->tableName} WHERE surname LIKE '%{$s}%' OR name LIKE '%{$s}%' OR patronym LIKE '%{$s}%'";

        return $this->getQueryArray($sql);
    }
}