<?php


namespace app\components;


use app\base\BaseComponent;
use app\database\ProfessorsHasSubjectsTable;
use app\database\ProfessorsTable;
use app\model\Professor;

class ProfessorsComponent extends BaseComponent
{
    public function __construct()
    {
        $this->table = new ProfessorsTable();
    }

    public function getById($id)
    {
        if (!empty($data = $this->table->get("*", ['id' => $id]))) {
            $genderComponent = new GenderComponent();
            $gender = $genderComponent->getById($data[0]['gender_id']);

            $data[0]['gender_name'] = $gender['name'];

            return $data[0];
        }
        else {
            return null;
        }
    }

    public function getBySubjectId($subject_id)
    {
        $professorsHasSubjectsTable = new ProfessorsHasSubjectsTable();

        if (!empty($professors = $professorsHasSubjectsTable->getProfessorsBySubjectId($subject_id))) {
            return $professors;
        }
        else {
            return null;
        }
    }

    public function add($surname, $name, $patronym, $gender_id)
    {
        $direction = new Professor($surname, $name, $patronym, $gender_id);

        if (!is_array($insert = $this->table->insert($direction))) {
            return true;
        }
        else {
            return $insert[0] . " " . $insert[2];
        }
    }

    public function edit($id, $surname, $name, $patronym, $gender_id)
    {
        if (!empty($this->table->get("*", ['id' => $id]))) {
            $update = $this->table->update(['surname' => $surname, 'name' => $name, 'patronym' => $patronym, 'gender_id' => $gender_id], ['id' => $id]);

            if (!is_array($update)) {
                return true;
            }
            else {
                return $update[0] . " " . $update[2];
            }
        }
        else {
            return "Такого преподавателя нет";
        }
    }

    public function delete($id)
    {
        $professorsHasSubjectsTable = new ProfessorsHasSubjectsTable();

        $this->table->beginTransaction();

        if (!is_array($deleteProf = $professorsHasSubjectsTable->delete(['professor_id' => $id]))) {
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
            return $deleteProf[0] . " " . $deleteProf[2];
        }
    }
}