<?php

class Error extends Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->view->title = 'Lỗi 404';
    $this->view->error = 404;
    // $this->view->msg = 'This page doesnt exists';
    $this->view->render('error/index');
  }

}

 ?>
