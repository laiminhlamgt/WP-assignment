<?php

class Login extends Controller {

  public function __construct() {
    parent::__construct();
    $this->view->js = 'views/login/js/script.js';
    Session::init();
  }

  public function index() {
    $logged = Session::get('loggedIn');
    if ($logged == true) {
      header('location: '.URL);
      exit;
    }

    $this->view->title = 'Đăng nhập';
    $this->view->render('login/index');
  }

  public function login() {
    // TODO: check login parameters
    $result = $this->model->login($_POST['email'], $_POST['password']);

    $count = count($result);
    // echo $count; die;
    if ($count > 0) {
      // login successful
      Session::init();
      Session::set('loggedIn', true);
      Session::set('role', $result[0]['role']);
      //Duong Tran 2016 0502
      Session::set('userId',$result[0]['id']);
      //End Duong Tran
      if ($result[0]['role'] == 'admin') {
        header('location: '.URL.'dashboard');
      } else {
        header('location: '.URL);
      }

    } else {
      $this->view->err = 'Địa chỉ email hoặc mật khẩu không đúng';
      $this->index();
    }
  }

  public function logout() {
    Session::destroy();
    header('location: '.URL.'login');
    exit;
  }

}

 ?>
