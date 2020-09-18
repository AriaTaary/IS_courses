<?php


namespace app\database;


use base\database\Table;

class DirectionsTable extends Table
{
    public function __construct($dbname = "default")
    {
        parent::__construct($dbname);

        $this->tableName = "directions";
    }

    public function search($s)
    {
        $sql =
            "SELECT * FROM {$this->tableName} WHERE name LIKE '%{$s}%'";

        return $this->getQueryArray($sql);
    }
}