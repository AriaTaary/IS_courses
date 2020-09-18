<?php


namespace app\model;


use base\model\Model;

class Student extends Model
{
    public $id;
    public $surname;
    public $name;
    public $patronym;
    public $gender_id;
    public $payment_id;
    public $group_id;

    /**
     * Student constructor.
     * @param $surname
     * @param $name
     * @param $patronym
     * @param $gender_id
     * @param $payment_id
     * @param $group_id
     */
    public function __construct($surname, $name, $patronym, $gender_id, $group_id, $payment_id)
    {
        $this->surname = $surname;
        $this->name = $name;
        $this->patronym = $patronym;
        $this->gender_id = $gender_id;
        $this->payment_id = $payment_id;
        $this->group_id = $group_id;

        $this->auto_increment = ['id'];
    }
}