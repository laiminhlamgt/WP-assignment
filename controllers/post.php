<?php

class Post extends Controller {

  public function __construct() {
    parent::__construct();
    $this->view->js = 'views/post/js/script.js';
    $this->view->title = 'Đăng tin mới';
  }

  public function index() {
    $this->view->render('post/index');
  }

}

 ?>
