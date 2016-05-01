<?php

class Controller {

  public function __construct() {
    $this->view = new View();
    $this->view->isExistParamInUrl = false;
  }

  public function loadModel($name) {
    $path = 'models/' . $name . '_model.php';
    if (file_exists($path)) {
      require $path;

      $modelName = $name . 'Model';
      $this->model = new $modelName();
    }
  }

  public function setIsDefaultPage($trueOrFalse) {
    $this->view->isDefaultPage = $trueOrFalse;
  }

  public function setExistParamInUrl($trueOrFalse) {
    $this->view->isExistParamInUrl = $trueOrFalse;
  }

}

 ?>
