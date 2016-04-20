<?php

class Index extends Controller {

  public function __construct() {
    parent::__construct();
    $this->view->js = 'views/index/js/script.js';
    $this->view->title = 'Trang chủ';
  }

  public function index() {
    $this->view->render('index/index');
  }

}

 ?>
