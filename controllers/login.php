<?php

class Login extends Controller {

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
        header('location: ../dashboard');
      } else {
        header('location: ../index');
      }

    } else {
      header('location: ../login');
      // TODO: return login failed
    }
  }

  public function logout() {
    Session::destroy();
    header('Location: ../login');
    exit;
  }

}

 ?>
