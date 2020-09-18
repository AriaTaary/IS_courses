<?php


namespace app\database;


use base\database\Table;

class SubjectsTable extends Table
{
    public function __construct($dbname = "default")
    {
        parent::__construct($dbname);

        $this->tableName = 'subjects';
    }

    public function search($s)
    {
        $sql =
            "SELECT * FROM {$this->tableName} WHERE name LIKE '%{$s}%'";

        return $this->getQueryArray($sql);
    }
}