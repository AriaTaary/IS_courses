<?php


namespace app\database;


use base\database\Table;

class GroupsTable extends Table
{
    public function __construct($dbname = "default")
    {
        parent::__construct($dbname);

        $this->tableName = "groups";
    }

    public function getAllWithDirections()
    {
        $sql = "select {$this->tableName}.*, directions.id as direction_id, directions.code as direction_code from {$this->tableName} left join directions on directions.id = {$this->tableName}.direction_id";

        return $this->getQueryArray($sql);
    }

    public function getByIdWithDirections($id)
    {
        $sql = "select groups.*, directions.code as direction_code, directions.name as direction_name from groups left join directions on directions.id = groups.direction_id where groups.id = {$id}";

        return $this->getQueryArray($sql);
    }

    public function search($s)
    {
        $sql =
            "SELECT {$this->tableName}.*, directions.id as direction_id, directions.code as direction_code FROM {$this->tableName} left join directions on directions.id = {$this->tableName}.direction_id WHERE number LIKE '%{$s}%'";

        return $this->getQueryArray($sql);
    }
}