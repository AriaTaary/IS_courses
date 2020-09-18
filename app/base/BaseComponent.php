<?php


namespace app\base;


use base\component\Component;

class BaseComponent extends Component
{
    protected $table;

    public function search($s)
    {
        if (!empty($search = $this->table->search($s))) {
            return $search;
        }
        else {
            return null;
        }
    }

    public function getAll()
    {
        if (!empty($data = $this->table->get("*"))) {
            return $data;
        }
        else {
            return null;
        }
    }

    public function getById($id)
    {
        if (!empty($data = $this->table->get("*", ['id' => $id]))) {
            return $data[0];
        }
        else {
            return null;
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