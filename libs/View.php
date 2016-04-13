<?php

class View {

  function __construct() {
    $this->error = 0;
  }

  public function render($filename, $noIncludeHeaderAndFooter = false, $login = false) {
    echo '<!DOCTYPE html><html><head>';
    require 'views/head.php';
    echo '</head><body>';

    if ($noIncludeHeaderAndFooter == true) {
      require 'views/' . $filename . '.php';

    } else {
      require 'views/header.php';
      require 'views/' . $filename . '.php';
      require 'views/footer.php';
    }

    echo '</body></html>';

  }

}

 ?>
