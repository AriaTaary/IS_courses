<?php


namespace app\components;


use app\base\BaseComponent;
use app\database\DirectionsTable;
use app\model\Direction;

class DirectionsComponent extends BaseComponent
{
    public function __construct()
    {
        $this->table = new DirectionsTable();
    }

    public function add($code, $name, $description, $price)
    {
        $direction = new Direction($code, $name, $description, $price);

        if (!is_array($insert = $this->table->insert($direction))) {
            return true;
        }
        else {
            return $insert[0] . " " . $insert[2];
        }
    }

    public function edit($id, $code, $name, $description, $price)
    {
        if (!empty($this->table->get("*", ['id' => $id]))) {
            $update = $this->table->update(['code' => $code, 'name' => $name, 'description' => $description, 'price' => $price], ['id' => $id]);

            if (!is_array($update)) {
                return true;
            }
            else {
                return $update[0] . " " . $update[2];
            }
        }
        else {
            return "Такого направления нет";
        }
    }

    public function delete($id)
    {
        if (!is_array($delete = $this->table->delete(['id' => $id]))) {
            return true;
        }
        else {
            return $delete[0] . " " . $delete[2];
        }
    }
}