<?php


namespace app\database;


use base\database\Table;

class UsersTable extends Table
{
    public function __construct($dbname = "default")
    {
        parent::__construct($dbname);

        $this->tableName = "users";
    }

    public function search($s)
    {
        $sql =
            "SELECT * FROM {$this->tableName} WHERE surname LIKE '%{$s}%' OR name LIKE '%{$s}%' OR fathername LIKE '%{$s}%'";

        return $this->getQueryArray($sql);
    }
}