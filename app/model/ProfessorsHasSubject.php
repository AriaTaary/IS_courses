<?php


namespace app\model;


use base\model\Model;

class ProfessorsHasSubject extends Model
{
    public $professor_id;
    public $subject_id;
    public $subject_direction_id;

    /**
     * ProfessorsHasSubject constructor.
     * @param $professor_id
     * @param $subject_id
     * @param $subject_direction_id
     */
    public function __construct($professor_id, $subject_id, $subject_direction_id)
    {
        $this->professor_id = $professor_id;
        $this->subject_id = $subject_id;
        $this->subject_direction_id = $subject_direction_id;
    }
}