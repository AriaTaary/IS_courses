<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\DirectionsComponent;
use app\components\SubjectsComponent;
use base\Page;
use base\View\View;

class DirectionsController extends BaseController
{
    private $component;

    public function __construct(Page &$page, $params)
    {
        parent::__construct($page, $params);

        $this->component = new DirectionsComponent();
    }

    public function index()
    {
        $directions = $this->component->getAll();

        new View("site/directions/index", $this->page, ['directions' => $directions]);
    }

    public function search()
    {
        $get = $this->page->getGet();
        $s = $get['s'];

        $directions = $this->component->search($s);

        new View("site/directions/index", $this->page, ['directions' => $directions, 'search' => $s]);
    }

    public function item()
    {
        $data = $this->component->getById($this->params['id']);
        $subjectsComponent = new SubjectsComponent();
        $subjects = $subjectsComponent->getByDirectionId($this->params['id']);

        new View("site/directions/item", $this->page, ['data' => $data, 'subjects' => $subjects]);
    }

    public function form()
    {
        if (empty($this->params)) {
            new View("site/directions/addForm", $this->page);
        }
        else {
            $data = $this->component->getById($this->params['id']);
            new View("site/directions/editForm", $this->page, ['data' => $data]);
        }
    }

    public function add()
    {
        $post = $this->page->getPost();

        $code = $post['code'];
        $name = $post['name'];
        $description = $post['description'];
        $price = $post['price'];

        $add = $this->component->add($code, $name, $description, $price);

        if ($add === true) {
            header("Location: /directions/");
        }
        else {
            new View("site/directions/addForm", $this->page, ['data' => $post, 'error' => $add]);
        }
    }

    public function edit()
    {
        $post = $this->page->getPost();

        $id = $post['id'];
        $code = $post['code'];
        $name = $post['name'];
        $description = $post['description'];
        $price = $post['price'];

        $edit = $this->component->edit($id, $code, $name, $description, $price);

        if ($edit === true) {
            header("Location: /directions/");
        }
        else {
            new View("site/directions/editForm", $this->page, ['data' => $post]);
        }
    }

    public function delete()
    {
        $get = $this->page->getGet();

        $id = $get['id'];

        $delete = $this->component->delete($id);

        if ($delete === true) {
            header("Location: /directions/");
        }
    }
}