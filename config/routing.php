<?php


use app\controllers\AuthController;
use app\controllers\DirectionsController;
use app\controllers\GroupsController;
use app\controllers\ProfessorsController;
use app\controllers\StudentsController;
use app\controllers\SubjectsController;
use app\controllers\UsersController;
use base\routing\Routing;

$routing = new Routing();

$routing->add('GET', '/', AuthController::class, 'form');
$routing->add('POST', '/', AuthController::class, 'auth');
$routing->add('GET', '/logout/', AuthController::class, 'logout', true);

/** Направления обучения */
$routing->add('GET', '/directions/', DirectionsController::class, 'index', true);
$routing->add('GET', '/directions/search/', DirectionsController::class, 'search', true);
$routing->add('GET', '/directions/{id}', DirectionsController::class, 'item', true);
$routing->add('GET', '/directions/add/', DirectionsController::class, 'form', true);
$routing->add('POST', '/directions/add/', DirectionsController::class, 'add', true);
$routing->add('GET', '/directions/add/params/', DirectionsController::class, 'subjectsForm', true);
$routing->add('POST', '/directions/add/params/', DirectionsController::class, 'addSubjects', true);
$routing->add('GET', '/directions/edit/{id}', DirectionsController::class, 'form', true);
$routing->add('POST', '/directions/edit/', DirectionsController::class, 'edit', true);
$routing->add('GET', '/directions/delete/', DirectionsController::class, 'delete', true);

/** Предметы */
$routing->add('GET', '/subjects/', SubjectsController::class, 'index', true);
$routing->add('GET', '/subjects/search/', SubjectsController::class, 'search', true);
$routing->add('GET', '/subjects/{id}', SubjectsController::class, 'item', true);
$routing->add('GET', '/subjects/add/', SubjectsController::class, 'form', true);
$routing->add('POST', '/subjects/add/', SubjectsController::class, 'add', true);
$routing->add('GET', '/subjects/edit/{id}', SubjectsController::class, 'form', true);
$routing->add('POST', '/subjects/edit/', SubjectsController::class, 'edit', true);
$routing->add('GET', '/subjects/delete/', SubjectsController::class, 'delete', true);

/** Преподаватели */
$routing->add('GET', '/professors/', ProfessorsController::class, 'index', true);
$routing->add('GET', '/professors/search/', ProfessorsController::class, 'search', true);
$routing->add('GET', '/professors/{id}', ProfessorsController::class, 'item', true);
$routing->add('GET', '/professors/add/', ProfessorsController::class, 'form', true);
$routing->add('POST', '/professors/add/', ProfessorsController::class, 'add', true);
$routing->add('GET', '/professors/edit/{id}', ProfessorsController::class, 'form', true);
$routing->add('POST', '/professors/edit/', ProfessorsController::class, 'edit', true);
$routing->add('GET', '/professors/delete/', ProfessorsController::class, 'delete', true);

/** Группы */
$routing->add('GET', '/groups/', GroupsController::class, 'index', true);
$routing->add('GET', '/groups/search/', GroupsController::class, 'search', true);
$routing->add('GET', '/groups/{id}', GroupsController::class, 'item', true);
$routing->add('GET', '/groups/add/', GroupsController::class, 'form', true);
$routing->add('POST', '/groups/add/', GroupsController::class, 'add', true);
$routing->add('GET', '/groups/edit/{id}', GroupsController::class, 'form', true);
$routing->add('POST', '/groups/edit/', GroupsController::class, 'edit', true);
$routing->add('GET', '/groups/delete/', GroupsController::class, 'delete', true);

/** Студенты */
$routing->add('GET', '/students/', StudentsController::class, 'index', true);
$routing->add('GET', '/students/search/', StudentsController::class, 'search', true);
$routing->add('GET', '/students/{id}', StudentsController::class, 'item', true);
$routing->add('GET', '/students/add/', StudentsController::class, 'form', true);
$routing->add('POST', '/students/add/', StudentsController::class, 'add', true);
$routing->add('GET', '/students/edit/{id}', StudentsController::class, 'form', true);
$routing->add('POST', '/students/edit/', StudentsController::class, 'edit', true);
$routing->add('GET', '/students/delete/', StudentsController::class, 'delete', true);

/** Пользователи */
$routing->add('GET', '/users/', UsersController::class, 'index', true);
$routing->add('GET', '/users/search/', UsersController::class, 'search', true);
$routing->add('GET', '/users/add/', UsersController::class, 'form', true);
$routing->add('POST', '/users/add/', UsersController::class, 'add', true);
$routing->add('GET', '/users/edit/{id}', UsersController::class, 'form', true);
$routing->add('POST', '/users/edit/', UsersController::class, 'edit', true);
$routing->add('GET', '/users/delete/', UsersController::class, 'delete', true);