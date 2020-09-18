<?php


namespace app\components;


use app\base\BaseComponent;
use app\database\TypeExamTable;

class TypeExamComponent extends BaseComponent
{
    public function __construct()
    {
        $this->table = new TypeExamTable();
    }
}