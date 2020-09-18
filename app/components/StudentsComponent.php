<?php


namespace app\components;


use app\base\BaseComponent;
use app\database\StudentsTable;
use app\model\Student;

class StudentsComponent extends BaseComponent
{
    public function __construct()
    {
        $this->table = new StudentsTable();
    }

    public function getAll()
    {
        if (!empty($data = $this->table->getAllWithGroups())) {
            return $data;
        }
        else {
            return null;
        }
    }

    public function getByGroupId($id)
    {
        $studentsTable = new StudentsTable();
        $students = $studentsTable->getByGroupId($id);

        if (!empty($students)) {
            return $students;
        }
        else {
            return null;
        }
    }

    public function getById($id)
    {
        if (!empty($data = $this->table->getByIdWithInfo($id))) {
            return $data[0];
        }
        else {
            return null;
        }
    }

    public function add($surname, $name, $patronym, $gender_id, $group_id, $payment_id)
    {
        $student = new Student($surname, $name, $patronym, $gender_id, $group_id, $payment_id);

        if (!is_array($insert = $this->table->insert($student))) {
            return true;
        }
        else {
            return $insert[0] . ' ' . $insert[2];
        }
    }

    public function edit($id, $surname, $name, $patronym, $gender_id, $group_id, $payment_id)
    {
        if (!is_array($update = $this->table->update(['surname' => $surname, 'name' => $name, 'patronym' => $patronym, 'gender_id' => $gender_id, 'group_id' => $group_id, 'payment_id' => $payment_id], ['id' => $id]))) {
            return true;
        }
        else {
            return $update[0] . " " . $update[2];
        }
    }
}