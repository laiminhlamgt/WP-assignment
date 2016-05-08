<?php

class Search extends Controller {

  public function __construct() {
    parent::__construct();
    // $this->view->js = 'views/post/js/script.js';
    $this->view->title = 'Tìm kiếm';
    $this->view->isMyPage = false;
  }

  public function index() {
    $this->view->render_search_page_template('search/index',true);
  }

  public function search() {
    $this->setExistParamInUrl(true);

    if (isset($_GET['content'])) {
      $content = trim($_GET['content']);

      $this->view->lstHouse = (empty($content))
        ? $this->_searchOption()
        : $this->_searchContent($_GET['content']);
    }
    // $this->view->lstHouse = $this->model->selectAll();
    $this->index();
  }

  public function mypage() {
    if (!isset($_GET['userId'])) {
      return;
    }
    $this->setExistParamInUrl(true);
    $this->view->title = 'Trang của tôi';
    $this->view->isMyPage = true;
    $this->view->lstHouse = $this->model->selectPostOfUser($_GET['userId']);
    $this->index();
  }

  private function _searchContent($content) {
    return $this->model->searchPostByContent($content);
  }

  private function _searchOption() {
    $bindValue = array();

    if (isset($_GET['stype-of-house'])) {
      $typeId = trim($_GET['stype-of-house']);
      if ($typeId > 0) {
        $bindValue['type_of_house_id'] = $typeId;
      }
    }

    if (isset($_GET['sdistrict'])) {
      $districtId = trim($_GET['sdistrict']);
      if ($districtId > 0) {
        $bindValue['district_id'] = $districtId;
      }
    }

    if (isset($_GET['sward'])) {
      $wardId = trim($_GET['sward']);
      if ($wardId > 0) {
        $bindValue['ward_id'] = $wardId;
      }
    }

    if (isset($_GET['sstreet'])) {
      $streetId = trim($_GET['sstreet']);
      if ($streetId > 0) {
        $bindValue['street_id'] = $streetId;
      }
    }

    if (isset($_GET['sprice'])) {
      $price = trim($_GET['sprice']);
      if ($price >= 0) {
        if ($price == 0) {
          $bindValue['min-price'] = 100000000;

        } else {
          $bindValue['max-price'] = $price;

          switch ($price) {
            case 3:
            case 5:
              $bindValue['min-price'] = $price - 2;
              break;
            case 30:
            case 50:
              $bindValue['min-price'] = $price - 20;
              break;
            case 10:
              $bindValue['min-price'] = $price - 5;
              break;
            case 10:
              $bindValue['min-price'] = $price - 50;
              break;
          }
          if (isset($bindValue['min-price'])) {
            $bindValue['min-price'] *= 1000000;
          }
          $bindValue['max-price'] *= 1000000;
        }
      }
    }

    if (isset($_GET['sarea'])) {
      $areas = explode('-', trim($_GET['sarea']));
      if (count($areas) == 2) {
        $areamin = $areas[0];
        $areamax = $areas[1];

        if ($areamin != 0 || $areamax != 0) {
          $bindValue['min-area'] = $areamin;
          if ($areamax != 0) {
            $bindValue['max-area'] = $areamax;
          }
        }
      }
    }

    if (isset($_GET['snum-of-room'])) {
      $num = trim($_GET['snum-of-room']);
      if ($num > 0) {
        $bindValue['number_of_room'] = $num;
      }
    }

    if (count($bindValue) > 0) {
      return $this->model->searchPostByOption($bindValue);
    } else {
      return null;
    }


  }

}


 ?>
