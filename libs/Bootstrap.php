<?php

class Bootstrap {

  public function __construct() {
    // if URL is http://localhost/WP-assignment/login/
    // $_GET['url'] return login/
    $url = isset($_GET['url']) ? $_GET['url'] : null;

    // In case URL is http://localhost/WP-assignment/
    // $url is null, then return home page
    if ($url == null) {
      require 'controllers/index.php';
      $controller = new Index();
      $controller->index();
      return false;
    }

    // remove the last slash in $url if exist ('login/doLogin/' become 'login/doLogin')
    $url = rtrim($url, '/');
    // if $url is login/doLogin
    // split $url in to array(login, doLogin)
    // 'login' is a controller name
    // 'doLogin' is the function name that will be called
    $url = explode('/', $url);

    $file = 'controllers/' . $url[0] . '.php';
    // check the controller file is exists
    if (file_exists($file)) {
      require $file;

    } else {
      // if controller not found, return error
      $this->_error();
      return false;
    }

    $controller = new $url[0];
    // load model if exists
    $controller->loadModel($url[0]);

    // $url[0] is a controller name
    // $url[1] is a function name of the controller
    // $url[2] is parameters
    if (isset($url[1])) {
      if (method_exists($controller, $url[1])) {
        if (isset($url[2])) {
          $controller->{$url[1]}($url[2]);

        } else {
          $controller->{$url[1]}();
        }

      } else {
        $this->_error();
      }

    } else {
      $controller->index();
    }
  }

  private function _loadDefaultController() {
    require 'controllers/index.php';
    $controller = new Index();
    $controller->index();
  }

  private function _loadExistingController() {
    require 'controllers/index.php';
    $controller = new Index();
    $controller->index();
  }

  private function _error() {
    require 'controllers/error.php';
    $controller = new Error();
    $controller->index();
  }

  // public function error() {
  //   require 'controllers/error.php';
  //   $controller = new Error();
  //   $controller->index();
  // }

}

 ?>
