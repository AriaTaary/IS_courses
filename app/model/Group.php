<?php


namespace app\model;


use base\model\Model;

class Group extends Model
{
    public $id;
    public $number;
    public $direction_id;

    /**
     * Group constructor.
     * @param $number
     * @param $direction_id
     */
    public function __construct($number, $direction_id)
    {
        $this->number = $number;
        $this->direction_id = $direction_id;

        $this->auto_increment = ['id'];
    }
}