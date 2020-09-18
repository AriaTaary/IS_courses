<?php


namespace app\model;


use base\model\Model;

class Professor extends Model
{
    public $id;
    public $surname;
    public $name;
    public $patronym;
    public $gender_id;

    /**
     * Professor constructor.
     * @param $surname
     * @param $name
     * @param $patronym
     * @param $gender_id
     */
    public function __construct($surname, $name, $patronym, $gender_id)
    {
        $this->surname = $surname;
        $this->name = $name;
        $this->patronym = $patronym;
        $this->gender_id = $gender_id;

        $this->auto_increment = ['id'];
    }
}