<?php

class Post extends Controller {

  public function __construct() {
    parent::__construct();
    $this->view->js = 'views/post/js/script.js';
    $this->view->title = 'Đăng tin mới';
  }

  public function index() {
    $this->view->lstTypeOfHouse = $this->model->getLstTypeOfHouse();
    $this->view->lstDistrict = $this->model->getLstDistrict();
    $this->view->render_search_page_template('post/index');
  }

  public function getLstWards() {
    if (isset($_GET['district_id'])) {
      $district_id = $_GET['district_id'];

      if ($district_id > 0 && $district_id < 25) {
        $lstWards = $this->model->getLstWards($district_id);
        echo json_encode($lstWards);
      }

    } else {

    }
  }

  public function getLstStreets() {
    if (isset($_GET['district_id'])) {
      $district_id = $_GET['district_id'];

      if ($district_id > 0 && $district_id < 25) {
        $lstStreets = $this->model->getLstStreets($district_id);
        echo json_encode($lstStreets);
      }

    } else {

    }
  }

  public function getLstProjects() {
    if (isset($_GET['district_id'])) {
      $district_id = $_GET['district_id'];

      if ($district_id > 0 && $district_id < 25) {
        $lstProjects = $this->model->getLstProjects($district_id);
        echo json_encode($lstProjects);
      }

    } else {

    }
  }

  public function post() {
    
  }

}

 ?>
