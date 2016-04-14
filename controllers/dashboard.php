<?php

class Dashboard extends Controller {

  public function __construct() {
    parent::__construct();
    Session::init();

    $logged = Session::get('loggedIn');
    if ($logged == false) {
      Session::destroy();
      header('Location: login');
      exit;
    }
    // print_r($_SESSION);
  }

  public function index() {
    $role = Session::get('role');
    if ($role != 'admin') {
      header('Location: index');
      exit;
    }
    $this->view->title = 'Chào admin';
    $this->view->render('dashboard/index');
  }

}

 ?>
