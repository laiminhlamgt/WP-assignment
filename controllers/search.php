<?php

class Search extends Controller {

  public function __construct() {
    parent::__construct();
    // $this->view->js = 'views/post/js/script.js';
    $this->view->title = 'Tìm kiếm';
  }

  public function index() {
    $this->view->render_search_page_template('search/index',true);
  }

  public function search() {
    $this->setExistParamInUrl(true);
    $this->view->lstHouse = $this->model->selectAll();
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
