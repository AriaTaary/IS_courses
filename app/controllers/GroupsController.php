<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\DirectionsComponent;
use app\components\GroupsComponent;
use app\components\StudentsComponent;
use base\Page;
use base\View\View;

class GroupsController extends BaseController
{
    private $component;

    public function __construct(Page &$page, $params)
    {
        parent::__construct($page, $params);

        $this->component = new GroupsComponent();
    }

    public function index()
    {
        $groups = $this->component->getAll();

        new View("site/groups/index", $this->page, ['groups' => $groups]);
    }

    public function search()
    {
        $get = $this->page->getGet();
        $s = $get['s'];

        $groups = $this->component->search($s);

        new View("site/groups/index", $this->page, ['groups' => $groups, 'search' => $s]);
    }

    public function item()
    {
        $data = $this->component->getById($this->params['id']);

        $studentsComponent = new StudentsComponent();
        $students = $studentsComponent->getByGroupId($this->params['id']);

        new View("site/groups/item", $this->page, ['data' => $data, 'students' => $students]);
    }

    public function form()
    {
        $directionsComponent = new DirectionsComponent();
        $directions = $directionsComponent->getAll();

        if (empty($this->params)) {
            new View("site/groups/addForm", $this->page, ['directions' => $directions]);
        }
        else {
            $data = $this->component->getById($this->params['id']);
            new View("site/groups/editForm", $this->page, ['data' => $data, 'directions' => $directions]);
        }
    }

    public function add()
    {
        $post = $this->page->getPost();

        $number = $post['number'];
        $direction_id = $post['direction_id'];

        $add = $this->component->add($number, $direction_id);

        if ($add === true) {
            header("Location: /groups/");
        }
        else {
            $directionsComponent = new DirectionsComponent();
            $directions = $directionsComponent->getAll();

            new View("site/groups/addForm", $this->page, ['data' => $post, 'error' => $add, 'directions' => $directions]);
        }
    }

    public function edit()
    {
        $post = $this->page->getPost();

        $id = $post['id'];
        $number = $post['number'];
        $direction_id = $post['direction_id'];

        $edit = $this->component->edit($id, $number, $direction_id);

        if ($edit === true) {
            header("Location: /groups/");
        }
        else {
            new View("site/groups/editForm", $this->page, ['data' => $post]);
        }
    }

    public function delete()
    {
        $get = $this->page->getGet();

        $id = $get['id'];

        $delete = $this->component->delete($id);

        if ($delete === true) {
            header("Location: /groups/");
        }
    }
}