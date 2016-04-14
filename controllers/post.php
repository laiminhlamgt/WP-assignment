<?php

class Post extends Controller {

  public function __construct() {
    parent::__construct();
    $this->view->js = 'views/post/js/script.js';
  }

  public function index() {
    $this->view->title = 'Đăng tin mới';
    $this->view->render('post/index');
  }

}

 ?>
