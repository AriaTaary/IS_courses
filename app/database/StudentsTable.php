<?php


namespace app\database;


use base\database\Table;

class StudentsTable extends Table
{
    public function __construct($dbname = "default")
    {
        parent::__construct($dbname);

        $this->tableName = "students";
    }

    public function getAllWithGroups()
    {
        $sql = "select {$this->tableName}.*, groups.number as group_number from {$this->tableName} left join groups on groups.id = {$this->tableName}.group_id";

        return $this->getQueryArray($sql);
    }

    public function getByIdWithInfo($id)
    {
        $sql = "
            select
                students.*,
                gender.name as gender_name,
                payment.name as payment_name,
                groups.number as group_number,
                directions.code as direction_code,
                directions.name as direction_name
            from
                students
            left join
                gender on gender.id = students.gender_id
            left join
                payment on payment.id = students.payment_id
            left join
                groups on groups.id = students.group_id
            left join
                directions on directions.id = groups.direction_id
            where
                students.id = {$id}
        ";

        return $this->getQueryArray($sql);
    }

    public function getByGroupId($id)
    {
        $sql =
            "select * from {$this->tableName} where group_id = '{$id}'";

        return $this->getQueryArray($sql);
    }

    public function search($s)
    {
        $sql =
            "SELECT {$this->tableName}.*, groups.number as group_number FROM {$this->tableName} left join groups on groups.id = {$this->tableName}.group_id WHERE surname LIKE '%{$s}%' OR name LIKE '%{$s}%' OR patronym LIKE '%{$s}%'";

        return $this->getQueryArray($sql);
    }
}