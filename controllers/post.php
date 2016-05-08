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
      header('Location: error');
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
    //Duong Tran 2016 0507 : edit for using in admin dashboard
    $this->view->isInDashboard = isset($_GET['dashboard']);

    $this->view->render_search_page_template('post/index', true, isset($_GET['dashboard']));
  }

  public function getLstTypeOfHouses() {
    $lstTypes = $this->model->getLstTypeOfHouse();
    echo json_encode($lstTypes);
  }

  public function getLstDistricts() {
    $lstDistricts = $this->model->getLstDistrict();
    echo json_encode($lstDistricts);
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

    if (isset($_POST['delete'])) {
      $result = $this->model->deleteHouse(Session::get('postId'));
      $this->view->result = ($result->successful)
        ? 'Đã xóa bài đăng'
        : 'Xảy ra lỗi trong quá trình xử lí';

      $this->view->render_search_page_template('post/post-result',false,isset($_POST['dashboard']));
      return;
    }
    $isValid = true;
    $newHouse = $this->_initHouse();

    $newHouse->userId = SESSION::get('userId');
    $newHouse->email = $_POST['email'];
    $newHouse->tel = $_POST['tel'];
    $newHouse->contactAddress = $_POST['addr'];
    $newHouse->numOfFloor = $_POST['number_of_floor'];
    $newHouse->numOfRoom = $_POST['number_of_room'];
    $newHouse->numOfRestroom = $_POST['number_of_restroom'];
    $newHouse->address = $_POST['address'];
    $newHouse->area = $_POST['area'];
    $newHouse->price = $_POST['price'];
    $newHouse->streetId = $_POST['street'];
    $newHouse->wardId = $_POST['ward'];
    $newHouse->districtId = $_POST['district'];

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

    if ($isValid) {
      if(isset($_POST['update'])) {
        $newHouse->postId = Session::get('postId');
        $result = $this->model->editHouse($newHouse);

        $this->view->result = ($result->successful)
          ? 'Cập nhật thành công'
          : 'Xảy ra lỗi trong quá trình xử lí';

      } else {
        $result = $this->model->addNewHouse($newHouse);

        $this->view->result = ($result->successful)
          ? 'Đăng tin thành công'
          : 'Xảy ra lỗi trong quá trình xử lí';
      }
      $this->view->render_search_page_template('post/post-result',false,isset($_POST['dashboard']));

    } else {
      //Duong Tran 2016 0507 : edit for post using in dashboard
      $this->view->isInDashboard = isset($_POST['dashboard']);
      $this->view->render_search_page_template('post/index', true, isset($_POST['dashboard']));
    }

  }

  public function edit() {
    $logged = Session::get('loggedIn');
    if ($logged == false) {
      header('Location: ../error');
      exit;
    }

    if (!isset($_GET['postId'])) {
      return;
    }

    $this->setExistParamInUrl(true);
    $house = $this->model->getHouse($_GET['postId'], SESSION::get('userId'), SESSION::get('role'));
    if (count($house) > 0) {
      $house = $house[0];

    } else {
      header('Location: ../error');
      exit;
    }

    Session::set('postId', $house['id']);
    $this->view->isEditMode = true;
    $this->view->typeOfHouseId = $house['type_of_house_id'];
    $this->view->districtId = $house['district_id'];
    $this->view->wardId = $house['ward_id'];
    $this->view->streetId = $house['street_id'];
    // $this->view->projectId = $house['project_id'];
    $this->view->price = $house['price'];
    $this->view->area = $house['area'];
    $this->view->address = $house['address'];
    $this->view->numOfFloor = $house['number_of_floor'];
    $this->view->numOfRoom = $house['number_of_room'];
    $this->view->numOfRestroom = $house['number_of_restroom'];
    $this->view->title = $house['post_title'];
    $this->view->description = $house['post_description'];
    $this->view->picture1Id = $house['picture1_id'];
    $this->view->fullname = $house['contact_name'];
    $this->view->contactAddress = $house['contact_address'];
    $this->view->tel = $house['telephone_number'];
    $this->view->mobile = $house['mobile_number'];
    $this->view->email = $house['email'];

    $this->view->lstTypeOfHouse = $this->model->getLstTypeOfHouse();
    $this->view->lstDistrict = $this->model->getLstDistrict();
    $this->view->lstWards = $this->model->getLstWards($house['district_id']);
    $this->view->lstStreets = $this->model->getLstStreets($house['district_id']);
    $this->view->lstProjects = $this->model->getLstProjects($house['district_id']);

    $this->view->isInDashboard = isset($_GET['dashboard']);
    $this->view->render_search_page_template('post/index', true, isset($_GET['dashboard']));
  }

  public function actionEdit($dashboard) {

  }

  private function _initHouse() {
    ob_start();
    $newHouse->userId = null;
    $newHouse->typeOfHouseId = null;
    $newHouse->streetId = null;
    $newHouse->wardId = null;
    $newHouse->districtId = null;
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
