<?php

class View {

  function __construct() {
    $this->error = 0;
    $this->error_message = '';
    $this->status = true;
  }

  public function render($filename, $noIncludeHeaderAndFooter = false) {
    echo '<!DOCTYPE html><html><head>';

    //Duong Tran 2016 0502 : generate configured value to use in js file
      echo '<script>';
      echo 'var Define_URL = ' . '"' . URL . '";';
      echo '</script>';

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

  //Duong Tran 2016 0423
  //the dashboard_render is used by admin views.
  public function dashboard_render($fileName, $fileDir = DashboardFileDirEnum::ROOT, $isPartialView = false)
  {
    //check that only admin can render dashboard.
    if(Session::get('loggedIn') != true || Session::get('role') != RoleEnum::Admin)
    {
      //if this is not browser full view request
      if($isPartialView == false)
      {
        header('Location: login');
        exit;
      }
      else // else, if this is partialview content request
      {
        echo 'Your session has timed out or you have no access right for this request, please login';
        exit;
      }
    }

    if($isPartialView)
    {
      require $fileDir . $fileName . '.php';
    }
    else
    {
      echo '<!DOCTYPE html><html><head>';
          //generate configured value to use in js file
      echo '<script>';
      echo 'var Define_URL = ' . '"' . URL . '";';
      echo 'var Define_Dashboard_ROOT = ' . '"' . DashboardFileDirEnum::ROOT . '";';
      echo '</script>';

      require DashboardFileDirEnum::ROOT . 'head.php';
      echo '</head><body id="d-db-body">';
      require DashboardFileDirEnum::ROOT . 'top-menu.php';
      require DashboardFileDirEnum::ROOT . 'main-menu.php';
      echo '<div class="mainContenter">';
      echo '<div id="mainContent">';
      require $fileDir . $fileName . '.php';
      echo '</div>';
      echo '</div>';

      require DashboardFileDirEnum::ROOT . 'modal-view.php';

      //require 'views/dashboard/popup.php';
      echo '</body></html>';
    }
  }

  public function render_search_page_template($contentFile, $isImportSubmitPicture = false,$justShowPostForm = false) {
    echo '<!DOCTYPE html><html><head>';

    if ($isImportSubmitPicture) {
      echo '<script>';
      echo 'var Define_URL = ' . '"' . URL . '";';
      echo '</script>';
    }

    require 'views/head.php';
    echo '</head><body>';

    //Duong Tran : just show the create-edit post part in popup window for admin
    if($justShowPostForm)
    {
      ?>
      <!-- Duong Tran hard code to edit css 1 -->
      <style>
      .m-config-search-result{width: 100% !important;}
      </style>
      <?php
      require 'views/' . $contentFile . '.php';
    }
    else
    {
      require 'views/header.php';
      require 'views/searchbar.php';

      echo '<div class="m-container"><div class="row m-search-overview">';
      require 'views/' . $contentFile . '.php';
      require 'views/rightcontent.php';
      echo "</div></div>";

      require 'views/footer.php';
    }
    echo '</body></html>';
  }
}

 ?>
