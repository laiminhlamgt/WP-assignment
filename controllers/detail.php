<?php

class Detail extends Controller {

  public function __construct() {
    parent::__construct();
    $this->view->title = 'Chi tiết';
    $this->view->js = 'views/detail/js/script.js';
  }

  public function index() {
    $this->setExistParamInUrl(true);

    if (isset($_GET['postId'])) {
      $house = $this->model->selectPost($_GET['postId']);

      if (count($house) > 0) {
        $this->view->isContainSlider = true;
        $this->view->house = $house[0];

      } else {
        $this->view->house = null;
      }

    } else {
      $this->view->house = null;
    }

    $this->view->render_search_page_template('detail/index',true);
  }

}

 ?>
