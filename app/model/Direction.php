<?php


namespace app\model;


use base\model\Model;

class Direction extends Model
{
    public $id;
    public $code;
    public $name;
    public $description;
    public $price;

    /**
     * Direction constructor.
     * @param $code
     * @param $name
     * @param $description
     * @param $price
     */
    public function __construct($code, $name, $description, $price)
    {
        $this->code = $code;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;

        $this->auto_increment = ['id'];
    }
}