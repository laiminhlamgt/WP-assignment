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
    $this->view->render('post/index');
  }

  public function getLstWard() {
    if (isset($_GET['district'])) {
      $district_id = $_GET['district'];

      if ($district_id > 0 && $district_id < 25) {
        $lstWard = $this->model->getLstWard($district_id);
        echo json_encode($lstWard);
      }

    } else {

    }
  }

  public function getLstStreet() {
    if (isset($_GET['district'])) {
      $district_id = $_GET['district'];

      if ($district_id > 0 && $district_id < 25) {
        $lstStreet = $this->model->getLstStreet($district_id);
        echo json_encode($lstStreet);
      }

    } else {

    }
  }

}

 ?>
