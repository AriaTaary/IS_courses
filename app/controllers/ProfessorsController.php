<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\GenderComponent;
use app\components\ProfessorsComponent;
use app\components\SubjectsComponent;
use base\Page;
use base\View\View;

class ProfessorsController extends BaseController
{
    private $component;

    public function __construct(Page &$page, $params)
    {
        parent::__construct($page, $params);

        $this->component = new ProfessorsComponent();
    }

    public function index()
    {
        $data = $this->component->getAll();

        new View("site/professors/index", $this->page, ['data' => $data]);
    }

    public function search()
    {
        $get = $this->page->getGet();
        $s = $get['s'];

        $data = $this->component->search($s);

        new View("site/professors/index", $this->page, ['data' => $data, 'search' => $s]);
    }

    public function item()
    {
        $data = $this->component->getById($this->params['id']);
        $subjectsComponent = new SubjectsComponent();
        $subjects = $subjectsComponent->getByProfessorId($this->params['id']);

        new View("site/professors/item", $this->page, ['data' => $data, 'subjects' => $subjects]);
    }

    public function form()
    {
        $genderComponent = new GenderComponent();
        $genders = $genderComponent->getAll();

        if (empty($this->params)) {
            new View("site/professors/addForm", $this->page, ['genders' => $genders]);
        }
        else {
            $data = $this->component->getById($this->params['id']);
            new View("site/professors/editForm", $this->page, ['data' => $data, 'genders' => $genders]);
        }
    }

    public function add()
    {
        $post = $this->page->getPost();

        $surname = $post['surname'];
        $name = $post['name'];
        $patronym = $post['patronym'];
        $gender_id = $post['gender_id'];

        $add = $this->component->add($surname, $name, $patronym, $gender_id);

        if ($add === true) {
            header("Location: /professors/");
        }
        else {
            $genderComponent = new GenderComponent();
            $genders = $genderComponent->getAll();
            new View("site/professors/addForm", $this->page, ['data' => $post, 'error' => $add, 'genders' => $genders]);
        }
    }

    public function edit()
    {
        $post = $this->page->getPost();

        $id = $post['id'];
        $surname = $post['surname'];
        $name = $post['name'];
        $patronym = $post['patronym'];
        $gender_id = $post['gender_id'];

        $edit = $this->component->edit($id, $surname, $name, $patronym, $gender_id);

        if ($edit === true) {
            header("Location: /professors/");
        }
        else {
            $genderComponent = new GenderComponent();
            $genders = $genderComponent->getAll();
            new View("site/professors/editForm", $this->page, ['data' => $post, 'error' => $edit, 'genders' => $genders]);
        }
    }

    public function delete()
    {
        $get = $this->page->getGet();

        $id = $get['id'];

        $delete = $this->component->delete($id);

        if ($delete === true) {
            header("Location: /professors/");
        }
    }
}