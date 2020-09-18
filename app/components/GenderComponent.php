<?php


namespace app\components;


use app\base\BaseComponent;
use app\database\GenderTable;

class GenderComponent extends BaseComponent
{
    public function __construct()
    {
        $this->table = new GenderTable();
    }
}