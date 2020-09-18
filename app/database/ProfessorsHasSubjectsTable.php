<?php


namespace app\database;


use base\database\Table;

class ProfessorsHasSubjectsTable extends Table
{
    public function __construct($dbname = "default")
    {
        parent::__construct($dbname);

        $this->tableName = "professors_has_subjects";
    }

    public function getProfessorsBySubjectId($subject_id)
    {
        $sql = "select
                    professors.id,
                    professors.surname,
                    professors.name,
                    professors.patronym,
                    gender.name as gender
                from
                    professors_has_subjects as phs
                left join
                    professors on professors.id = phs.professor_id
                left join
                    gender on gender.id = professors.gender_id
                where
                    phs.subject_id = '$subject_id';";

        return $this->getQueryArray($sql);
    }

    public function getSubjectsByProfessor($professor_id)
    {
        $sql = "select
                    subjects.id,
                    subjects.name
                from
                    professors_has_subjects as phs
                left join
                    subjects on subjects.id = phs.subject_id
                where
                    phs.professor_id = '$professor_id';";

        return $this->getQueryArray($sql);
    }

    public function getSubjectsByDirection($direction_id)
    {
        $sql = "select distinct 
                    subjects.id,
                    subjects.name
                from
                    professors_has_subjects as phs
                left join
                    subjects on subjects.id = phs.subject_id
                where
                    phs.subject_direction_id = '$direction_id'
                order by
                    subjects.id;";

        return $this->getQueryArray($sql);
    }
}