<?php

require 'config.php';

//Duong Tran 2016 0424
require_once 'libs/Enumerations.php';
require_once 'addons/installed_addons.php';

function __autoload($class) {
  require LIBS . $class . '.php';
}

$app = new Bootstrap();

 ?>
