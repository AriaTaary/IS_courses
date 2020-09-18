<?php


namespace app\components;


use app\base\BaseComponent;
use app\database\PaymentTable;

class PaymentComponent extends BaseComponent
{
    public function __construct()
    {
        $this->table = new PaymentTable();
    }
}