<?php

class Post extends Controller {

  public function __construct() {
    parent::__construct();
    Session::init();
    $this->view->js = 'views/post/js/script.js';
    $this->view->title = 'Đăng tin mới';
  }

  public function index() {
    $logged = Session::get('loggedIn');
    if ($logged == false) {
      header('Location: index');
      exit;
    }

    $userInfo = $this->model->getUserInfo(Session::get('userId'));

    $this->view->fullname = $userInfo['last_name'] . ' ' . $userInfo['first_name'];
    if ($userInfo['telephone_number'] != null) {
      $this->view->tel = $userInfo['telephone_number'];
    }
    if ($userInfo['mobile_number'] != null) {
      $this->view->mobile = $userInfo['mobile_number'];
    }
    $this->view->email = $userInfo['email'];

    $this->view->lstTypeOfHouse = $this->model->getLstTypeOfHouse();
    $this->view->lstDistrict = $this->model->getLstDistrict();
    $this->view->render_search_page_template('post/index', true);
  }

  public function getLstWards() {
    if (isset($_GET['district_id'])) {
      $district_id = $_GET['district_id'];

      if ($district_id > 0 && $district_id < 25) {
        $lstWards = $this->model->getLstWards($district_id);
        echo json_encode($lstWards);
      }

    } else {

    }
  }

  public function getLstStreets() {
    if (isset($_GET['district_id'])) {
      $district_id = $_GET['district_id'];

      if ($district_id > 0 && $district_id < 25) {
        $lstStreets = $this->model->getLstStreets($district_id);
        echo json_encode($lstStreets);
      }

    } else {

    }
  }

  public function getLstProjects() {
    if (isset($_GET['district_id'])) {
      $district_id = $_GET['district_id'];

      if ($district_id > 0 && $district_id < 25) {
        $lstProjects = $this->model->getLstProjects($district_id);
        echo json_encode($lstProjects);
      }

    } else {

    }
  }

  public function post() {
    $this->setExistParamInUrl(true);
    $isValid = true;
    $newHouse = $this->_initHouse();

    // validate mobile number
    if (isset($_POST['mobile'])) {
      $mobileNumber = trim($_POST['mobile']);
      $lenOfNumber = strlen($mobileNumber);
      if ($lenOfNumber == 0) {
        $this->view->errMobile = 'Bạn cần nhập số di động';
        $isValid = false;

      } else if (!$this->_isMobileNumber($mobileNumber)) {
        $this->view->errMobile = 'Số điện thoại không đúng định dạng. '
          . 'Mời bạn nhập lại!';
        $isValid = false;

      } else {
        $newHouse->mobile = $mobileNumber;
      }

    } else {
      $this->view->errMobile = 'Bạn cần nhập số di động';
      $isValid = false;
    }

    // validate name
    if (isset($_POST['name'])) {
      $name = trim($_POST['name']);
      if (strlen($name) == 0) {
        $this->view->errName = 'Bạn cần nhập họ tên';
        $isValid = false;

      } else {
        $newHouse->contactName = $name;
      }

    } else {
      $this->view->errName = 'Bạn cần nhập họ tên';
      $isValid = false;
    }

    if (isset($_POST['image'])) {
      $image = trim($_POST['image']);
      if (strlen($image) > 0) {
        $newHouse->picture1Id = $image;
      }
    }

    // validate description
    if (isset($_POST['description'])) {
      $description = trim($_POST['description']);
      $lenOfDescription = strlen($description);
      if ($lenOfDescription == 0) {
        $this->view->errDescription = 'Bạn cần nhập nội dung mô tả';
        $isValid = false;

      } else if ($lenOfDescription < 5) {
        $this->view->errDescription = 'Nội dung mô tả phải có ít nhất 5 kí tự';
        $isValid = false;

      } else {
        $newHouse->postDescription = $description;
      }

    } else {
      $this->view->errDescription = 'Bạn cần nhập nội dung mô tả';
      $isValid = false;
    }

    // validate title
    if (isset($_POST['title'])) {
      $title = trim($_POST['title']);
      $lenOfTitle = strlen($title);
      if ($lenOfTitle == 0) {
        $this->view->errTitle = 'Bạn cần nhập tiêu đề';
        $isValid = false;

      } else if ($lenOfTitle < 5) {
        $this->view->errTitle = 'Tiêu đề phải có ít nhất 5 kí tự';
        $isValid = false;

      } else {
        $newHouse->postTitle = $title;
      }

    } else {
      $this->view->errTitle = 'Bạn cần nhập tiêu đề';
      $isValid = false;
    }

    // validate type of house
    if (isset($_POST['type-of-house'])) {
      if ($_POST['type-of-house'] < 1) {
        $this->view->errTypeOfHouse = 'Bạn cần chọn loại nhà đất';
        $isValid = false;

      } else {
        $newHouse->typeOfHouseId = $_POST['type-of-house'];
      }

    } else {
      $this->view->errTypeOfHouse = 'Bạn cần chọn loại nhà đất';
      $isValid = false;
    }

    $newHouse->userId = Session::get('userId');

    if ($isValid) {
      $result = $this->model->addNewHouse($newHouse);

      $this->view->result = ($result->successful)
        ? 'Đăng tin thành công'
        : 'Xảy ra lỗi trong quá trình xử lí';

      $this->view->render_search_page_template('post/post-result');

    } else {
      $this->view->render_search_page_template('post/index', true);
    }

  }

  private function _initHouse() {
    ob_start();
    $newHouse->typeOfHouseId = null;
    $newHouse->locationId = null;
    $newHouse->price = null;
    $newHouse->area = null;
    $newHouse->address = null;
    $newHouse->numOfFloor = null;
    $newHouse->numOfRoom = null;
    $newHouse->numOfRestroom = null;
    $newHouse->postTitle = null;
    $newHouse->postDescription = null;
    $newHouse->picture1Id = null;
    $newHouse->contactName = null;
    $newHouse->contactAddress = null;
    $newHouse->tel = null;
    $newHouse->mobile = null;
    $newHouse->email = null;
    $newHouse->userId = null;
    ob_end_clean();

    return $newHouse;
  }

  private function _isMobileNumber($number) {
    return preg_match("/^(0|\+84)\d{9,10}$/", $number);
  }

}

 ?>
