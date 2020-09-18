<?php


namespace app\database;


use base\database\Table;

class TypeExamTable extends Table
{
    public function __construct($dbname = "default")
    {
        parent::__construct($dbname);

        $this->tableName = "type_exam";
    }
}