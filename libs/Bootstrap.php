<?php

class Bootstrap {

  public function __construct() {
    $url = $this->_getURL();
// echo $_POST['email'] .' ' .Hash::create('md5', $_POST['password'], HASH_PASSWORD_KEY) ;die();
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
    $controllerName = $url[0];

    
    $file = 'controllers/' . $controllerName . '.php';
    // check the controller file is exists
    if (file_exists($file)) {
      require $file;

    } else {
      // if controller not found, return error
       $this->_error();
      
      return false;
    }

    $controller = new $controllerName;
    // load model if exists
    $controller->loadModel($controllerName);

    // $url[0] is a controller name
    // $url[1] is a function name of the controller
    // $url[2] is parameters
    if (isset($url[1])) {
      if (preg_match('/\?/', $url[1])) {
        // if $url[1] is search?content=abc
        // sub $url[1] to search
        $methodName = substr($url[1], 0, strpos($url[1], '?'));

      } else {
        $methodName = $url[1];
      }

      if (method_exists($controller, $methodName)) {
        if (isset($url[2])) {
          $controller->{$methodName}($url[2]);

        } else {
          $controller->{$methodName}();
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

  private function _getURL() {
    $url = $_SERVER['REQUEST_URI'];
    // remove '/WP-assignment/' from $url
    $url = str_replace(ROOT_FOLDER, '', $url);

    return $url;
  }

}

 ?>
