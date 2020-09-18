<?php


namespace app\controllers;


use app\base\BaseController;
use app\components\GenderComponent;
use app\components\GroupsComponent;
use app\components\PaymentComponent;
use app\components\StudentsComponent;
use base\Page;
use base\View\View;

class StudentsController extends BaseController
{
    private $component;

    public function __construct(Page &$page, $params)
    {
        parent::__construct($page, $params);

        $this->component = new StudentsComponent();
    }

    public function index()
    {
        $students = $this->component->getAll();

        new View("site/students/index", $this->page, ['data' => $students]);
    }

    public function search()
    {
        $get = $this->page->getGet();
        $s = $get['s'];

        $students = $this->component->search($s);

        new View("site/students/index", $this->page, ['data' => $students]);
    }

    public function item()
    {
        $data = $this->component->getById($this->params['id']);

        new View("site/students/item", $this->page, ['data' => $data]);
    }

    public function form()
    {
        $genderComponent = new GenderComponent();
        $genders = $genderComponent->getAll();

        $groupsComponent = new GroupsComponent();
        $groups = $groupsComponent->getAll();

        $paymentComponent = new PaymentComponent();
        $payment_status = $paymentComponent->getAll();

        if (empty($this->params)) {
            new View("site/students/addForm", $this->page, ['genders' => $genders, 'groups' => $groups, 'payment_status' => $payment_status]);
        }
        else {
            $data = $this->component->getById($this->params['id']);
            new View("site/students/editForm", $this->page, ['data' => $data, 'genders' => $genders, 'groups' => $groups, 'payment_status' => $payment_status]);
        }
    }

    public function add()
    {
        $post = $this->page->getPost();

        $surname = $post['surname'];
        $name = $post['name'];
        $patronym = $post['patronym'];
        $gender_id = $post['gender_id'];
        $group_id = $post['group_id'];
        $payment_id = $post['payment_id'];

        $add = $this->component->add($surname, $name, $patronym, $gender_id, $group_id, $payment_id);

        if ($add === true) {
            header("Location: /students/");
        }
        else {
            $genderComponent = new GenderComponent();
            $genders = $genderComponent->getAll();

            $groupsComponent = new GroupsComponent();
            $groups = $groupsComponent->getAll();

            $paymentComponent = new PaymentComponent();
            $payment_status = $paymentComponent->getAll();

            new View("site/students/addForm", $this->page, ['data' => $post, 'error' => $add, 'genders' => $genders, 'groups' => $groups, 'payment_status' => $payment_status]);
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
        $group_id = $post['group_id'];
        $payment_id = $post['payment_id'];

        $edit = $this->component->edit($id, $surname, $name, $patronym, $gender_id, $group_id, $payment_id);

        if ($edit === true) {
            header("Location: /students/");
        }
        else {
            $genderComponent = new GenderComponent();
            $genders = $genderComponent->getAll();

            $groupsComponent = new GroupsComponent();
            $groups = $groupsComponent->getAll();

            $paymentComponent = new PaymentComponent();
            $payment_status = $paymentComponent->getAll();
            new View("site/students/editForm", $this->page, ['data' => $post, 'error' => $edit, 'genders' => $genders, 'groups' => $groups, 'payment_status' => $payment_status]);
        }
    }

    public function delete()
    {
        $get = $this->page->getGet();

        $id = $get['id'];

        $delete = $this->component->delete($id);

        if ($delete === true) {
            header("Location: /students/");
        }
    }
}