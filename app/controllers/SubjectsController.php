<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\DirectionsComponent;
use app\components\ProfessorsComponent;
use app\components\SubjectsComponent;
use app\components\TypeExamComponent;
use base\Page;
use base\View\View;

class SubjectsController extends BaseController
{
    private $component;

    public function __construct(Page &$page, $params)
    {
        parent::__construct($page, $params);

        $this->component = new SubjectsComponent();
    }

    public function index()
    {
        $data = $this->component->getAll();

        new View("site/subjects/index", $this->page, ['data' => $data]);
    }

    public function search()
    {
        $get = $this->page->getGet();
        $s = $get['s'];

        $data = $this->component->search($s);

        new View("site/subjects/index", $this->page, ['data' => $data, 'search' => $s]);
    }

    public function item()
    {
        $data = $this->component->getById($this->params['id']);
        $professorsComponent = new ProfessorsComponent();
        $professors = $professorsComponent->getBySubjectId($this->params['id']);

        new View("site/subjects/item", $this->page, ['data' => $data, 'professors' => $professors]);
    }

    public function form()
    {
        $directionsComponent = new DirectionsComponent();
        $directions = $directionsComponent->getAll();

        $professorsComponent = new ProfessorsComponent();
        $professors = $professorsComponent->getAll();

        $typeExamComponent = new TypeExamComponent();
        $type_exams = $typeExamComponent->getAll();

        if (empty($this->params)) {
            new View("site/subjects/addForm", $this->page, ['type_exams' => $type_exams, 'directions' => $directions,'professors' => $professors]);
        }
        else {
            $data = $this->component->getById($this->params['id']);
            new View("site/subjects/editForm", $this->page, ['data' => $data, 'type_exams' => $type_exams, 'directions' => $directions, 'professors' => $professors]);
        }
    }

    public function add()
    {
        $post = $this->page->getPost();

        $name = $post['name'];
        // $description = $post['description'];
        $description = null;
        $directions_id = $post['directions_id'];
        $professors_id = $post['professors_id'];
        $type_exam_id = $post['type_exam_id'];

        // var_dump($post);

        $add = $this->component->add($name, $description, $directions_id, $professors_id, $type_exam_id);

        if ($add === true) {
            header("Location: /subjects/");
        }
        else {
            new View("site/subjects/addForm", $this->page, ['data' => $post, 'error' => $add]);
        }
    }

    public function edit()
    {
        $post = $this->page->getPost();

        $id = $post['id'];
        $name = $post['name'];
        $direction_id = $post['directions_id'];
        $type_exam_id = $post['type_exam_id'];

        $edit = $this->component->edit($id, $name, $direction_id, $type_exam_id);

        if ($edit === true) {
            header("Location: /subjects/");
        }
        else {
            new View("site/subjects/editForm", $this->page, ['data' => $post]);
        }
    }

    public function delete()
    {
        $get = $this->page->getGet();

        $id = $get['id'];

        $delete = $this->component->delete($id);

        if ($delete === true) {
            header("Location: /subjects/");
        }
    }
}