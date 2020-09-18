<?php


namespace app\model;


use base\model\Model;

class Subject extends Model
{
    public $id;
    public $name;
    public $description;
    public $direction_id;
    public $type_exam_id;

    /**
     * Subject constructor.
     * @param $name
     * @param $description
     * @param $direction_id
     * @param $type_exam_id
     */
    public function __construct($name, $description, $direction_id, $type_exam_id)
    {
        $this->name = $name;
        $this->description = $description;
        $this->direction_id = $direction_id;
        $this->type_exam_id = $type_exam_id;

        $this->auto_increment = ['id'];
    }
}