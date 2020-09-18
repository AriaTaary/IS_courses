<?php


namespace app\components;


use app\base\BaseComponent;
use app\database\ProfessorsHasSubjectsTable;
use app\database\SubjectsTable;
use app\model\ProfessorsHasSubject;
use app\model\Subject;

class SubjectsComponent extends BaseComponent
{
    public function __construct()
    {
        $this->table = new SubjectsTable();
    }

    public function getById($id)
    {
        if (!empty($data = $this->table->get("*", ['id' => $id]))) {
            $typeExamComponent = new TypeExamComponent();
            $typeExam = $typeExamComponent->getById($data[0]['type_exam_id']);
            $data[0]['type_exam'] = $typeExam['name'];

            return $data[0];
        }
        else {
            return null;
        }
    }

    public function getByProfessorId($professor_id)
    {
        $professorsHasSubjectsTable = new ProfessorsHasSubjectsTable();

        if (!empty($subjects = $professorsHasSubjectsTable->getSubjectsByProfessor($professor_id))) {
            return $subjects;
        }
        else {
            return null;
        }
    }

    public function getByDirectionId($direction_id)
    {
        $professorsHasSubjectsTable = new ProfessorsHasSubjectsTable();

        if (!empty($subjects = $professorsHasSubjectsTable->getSubjectsByDirection($direction_id))) {
            return $subjects;
        }
        else {
            return null;
        }
    }

    public function add($name, $description, $directions_id, $professors_id, $type_exam_id)
    {
        $this->table->beginTransaction();

        $subject = new Subject($name, $description, 1, $type_exam_id);

        if (!is_array($insert = $this->table->insert($subject))) {
            $subject_id = $this->table->getInsertId();

            $professorsHasSubjectsTable = new ProfessorsHasSubjectsTable();

            foreach ($professors_id as $professor_id) {
                foreach ($directions_id as $direction_id) {
                    $professorsHasSubject = new ProfessorsHasSubject($professor_id, $subject_id, $direction_id);
                    if (is_array($insert = $professorsHasSubjectsTable->insert($professorsHasSubject))) {
                        $this->table->rollBack();
                        return $insert[0] . " " . $insert[2];
                    }
                }
            }

            $this->table->commit();
            return true;
        }
        else {
            return $insert[0] . " " . $insert[2];
        }
    }

    public function edit($id, $name, $direction_id, $type_exam_id)
    {
        if (!empty($this->table->get("*", ['id' => $id]))) {
            $update = $this->table->update(['name' => $name, 'direction_id' => $direction_id, 'type_exam_id' => $type_exam_id], ['id' => $id]);

            if (!is_array($update)) {
                return true;
            }
            else {
                return $update[0] . " " . $update[2];
            }
        }
        else {
            return "Такого направления нет";
        }
    }

    public function delete($id)
    {
        $professorsHasSubjectsTable = new ProfessorsHasSubjectsTable();

        $this->table->beginTransaction();

        if (!is_array($deleteSubj = $professorsHasSubjectsTable->delete(['subject_id' => $id]))) {
            if (!is_array($delete = $this->table->delete(['id' => $id]))) {
                $this->table->commit();
                return true;
            }
            else {
                $this->table->rollBack();
                return $delete[0] . " " . $delete[2];
            }
        }
        else {
            $this->table->rollBack();
            return $deleteSubj[0] . " " . $deleteSubj[2];
        }
    }
}