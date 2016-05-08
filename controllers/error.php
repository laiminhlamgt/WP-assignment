<?php

class Error extends Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->view->title = 'Không tìm thấy trang';
    $this->view->error = 404;
    // $this->view->msg = 'This page doesnt exists';
    $this->view->render('error/index');
  }

}

 ?>
