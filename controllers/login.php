<?php

class Login extends Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->view->title = 'Đăng nhập';
    $this->view->render('login/index');
  }

  public function login() {
    // TODO: check login parameters
    $this->model->login($_POST['email'], $_POST['password']);
  }

}

 ?>
