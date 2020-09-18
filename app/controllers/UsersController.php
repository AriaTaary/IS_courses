<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\AuthComponent;
use app\components\StatusComponent;
use app\components\UsersComponent;
use base\App;
use base\Page;
use base\View\View;

class UsersController extends BaseController
{
    /** @var UsersComponent */
    private $component;

    /** @var AuthComponent */
    private $authComponent;

    public function __construct(Page &$page, $params)
    {
        parent::__construct($page, $params);

        $this->setComponents();
    }

    public function index()
    {
        $users = $this->component->getAll();

        new View("site/users/index", $this->page, ['data' => $users]);
    }

    public function search()
    {
        $get = $this->page->getGet();
        $s = $get['s'];

        $users = $this->component->search($s);

        new View("site/users/index", $this->page, ['data' => $users, 'search' => $s]);
    }

    public function form()
    {
        $statuses = $this->getStatuses();

        if (empty($this->params)) {
            new View("site/users/addForm", $this->page, ['statuses' => $statuses]);
        }
        else {
            $data = $this->component->getById($this->params['id']);
            new View("site/users/editForm", $this->page, ['data' => $data, 'statuses' => $statuses]);
        }
    }

    public function add()
    {
        $post = $this->page->getPost();

        $email = $post['email'];
        $password = $post['password'];
        $passwordTwice = $post['password_twice'];
        $name = $post['name'];
        $surname = $post['surname'];
        $fathername = $post['fathername'];
        $status_id = $post['status_id'];

        $add = $this->authComponent->register($email, $password, $passwordTwice, $name, $surname, $fathername, $status_id);

        if ($add === true) {
            header("Location: /users/");
        }
        else {
            $statuses = $this->getStatuses();
            new View("site/users/addForm", $this->page, ['data' => $post, 'error' => $add, 'statuses' => $statuses]);
        }
    }

    public function edit()
    {
        $post = $this->page->getPost();

        $id = $post['id'];
        $email = $post['email'];
        $name = $post['name'];
        $surname = $post['surname'];
        $fathername = $post['fathername'];
        $status_id = $post['status_id'];

        $edit = $this->authComponent->update($id, $email, $name, $surname, $fathername, $status_id);

        if ($edit === true) {
            header("Location: /users/");
        }
        else {
            $statuses = $this->getStatuses();
            new View("site/users/editForm", $this->page, ['data' => $post, 'error' => $edit, 'statuses' => $statuses]);
        }
    }

    public function delete()
    {
        $get = $this->page->getGet();
        $id = $get['id'];

        if ($this->component->delete($id)) {
            header("Location: /users/");
        }
    }

    private function setComponents()
    {
        $this->component = new UsersComponent();
        $this->authComponent = new AuthComponent();
    }

    private function getStatuses()
    {
        $statusComponent = new StatusComponent();
        return $statusComponent->getAll();
    }
}