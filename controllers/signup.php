<?php

class Signup extends Controller {

  public function __construct() {
    parent::__construct();
    Session::init();
  }

  public function index() {
    $logged = Session::get('loggedIn');
    if ($logged == true) {
      header('Location: ./index');
      exit;
    }

    $this->view->title = 'Đăng kí';
    $this->view->render('signup/index');
  }

  public function signup() {
    // TODO: check signup parameters
    $this->model->signup($_POST['email'], $_POST['password']);
  }

  // public function logout() {
  //   Session::destroy();
  //   header('Location: ../login');
  //   exit;
  // }

}

 ?>
