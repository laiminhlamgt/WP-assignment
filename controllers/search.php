<?php

class Search extends Controller {

  public function __construct() {
    parent::__construct();
    // $this->view->js = 'views/post/js/script.js';
    $this->view->title = 'Tìm kiếm';
    $this->view->isSearch = true;
  }

  public function index() {
    $this->view->render('search/index');
  }

  public function search() {
    // echo "Have gone to search function in SeachController";
    // if (isset($_GET['content'])) {
    //   $content = $_GET['content'];
    //   echo "{result: $content}";
    // }
    // else {
    //   echo "{result: something}";
    // }
    $this->index();
  }

}


 ?>
