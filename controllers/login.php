<?php

class Login extends Controller {

  public function __construct() {
    parent::__construct();
    Session::init();

    $logged = Session::get('loggedIn');
    if ($logged == true) {
      Session::destroy();
      header('Location: ../index');
      exit;
    }
  }

  public function index() {
    $this->view->title = 'Đăng nhập';
    $this->view->render('login/index');
  }

  public function login() {
    // TODO: check login parameters
    $this->model->login($_POST['email'], $_POST['password']);
  }

  public function logout() {
    Session::destroy();
    header('Location: ../login');
    exit;
  }

}

 ?>
