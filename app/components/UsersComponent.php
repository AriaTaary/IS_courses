<?php


namespace app\components;


use app\base\BaseComponent;
use app\database\StatusTable;
use app\database\UsersTable;

class UsersComponent extends BaseComponent
{
    public function __construct()
    {
        $this->table = new UsersTable();
    }

    public function search($s)
    {
        if (!empty($data = $this->table->search($s))) {
            $statusTable = new StatusTable();

            foreach ($data as $key => $item) {
                $status = $statusTable->get("*", ['id' => $item['status_id']]);
                $data[$key]['status'] = $status[0]['runame'];
            }

            return $data;
        }
        else {
            return null;
        }
    }

    public function getAll()
    {
        if (!empty($data = $this->table->get("*"))) {
            $statusTable = new StatusTable();

            foreach ($data as $key => $item) {
                $status = $statusTable->get("*", ['id' => $item['status_id']]);
                $data[$key]['status'] = $status[0]['runame'];
            }

            return $data;
        }
        else {
            return null;
        }
    }
}