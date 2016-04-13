<?php

class Controller {

  public function __construct() {
    $this->view = new View();
  }

  public function loadModel($name) {
    $path = 'models/' . $name . '_model.php';
    if (file_exists($path)) {
      require $path;

      $modelName = $name . 'Model';
      $this->model = new $modelName();
    }
  }

}

 ?>
