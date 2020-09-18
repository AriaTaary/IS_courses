<?php


namespace app\components;


use app\base\BaseComponent;
use app\database\GroupsTable;
use app\model\Group;

class GroupsComponent extends BaseComponent
{
    public function __construct()
    {
        $this->table = new GroupsTable();
    }

    public function getAll()
    {
        if (!empty($data = $this->table->getAllWithDirections())) {
            return $data;
        }
        else {
            return null;
        }
    }

    public function getById($id)
    {
        if (!empty($data = $this->table->getByIdWithDirections($id))) {
            return $data[0];
        }
        else {
            return null;
        }
    }

    public function add($number, $direction_id)
    {
        $group = new Group($number, $direction_id);

        if (!is_array($insert = $this->table->insert($group))) {
            return true;
        }
        else {
            return $insert[0] . " " . $insert[2];
        }
    }

    public function edit($id, $number, $direction_id)
    {
        if (!is_array($update = $this->table->update(['number' => $number, 'direction_id' => $direction_id], ['id' => $id]))) {
            return true;
        }
        else {
            return $update[0] . " " . $update[2];
        }
    }
}