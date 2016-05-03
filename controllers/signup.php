<?php

class Signup extends Controller {

  public function __construct() {
    parent::__construct();
    $this->view->js = 'views/signup/js/script.js';
    $this->view->title = 'Đăng kí';
    Session::init();
  }

  public function index() {
    $logged = Session::get('loggedIn');
    if ($logged == true) {
      header('Location: index');
      exit;
    }

    $this->view->render('signup/index');
  }

  public function signup() {
    $this->setExistParamInUrl(true);
    $isValid = true;
    $newUser = $this->_initUser();

    // validate mobile number
    if (isset($_POST['mobile'])) {
      $mobileNumber = trim($_POST['mobile']);
      $lenOfNumber = strlen($mobileNumber);
      if ($lenOfNumber > 0) {
        if (!$this->_isMobileNumber($mobileNumber)) {
          $this->view->err = 'Số điện thoại không đúng định dạng.<br>'
            . 'Mời bạn nhập lại!';
          $isValid = false;

        } else {
          $newUser->mobile = $mobileNumber;
        }
      }
    }

    // validate password
    if (!isset($_POST['password'])) {
      $this->view->err = 'Bạn cần nhập password';
      $isValid = false;

    } else if (!isset($_POST['repassword'])) {
      $this->view->err = 'Bạn cần xác nhận password';
      $isValid = false;

    } else {
      $password = trim($_POST['password']);
      $repassword = trim($_POST['repassword']);

      if (strcmp($password, $repassword) != 0) {
        $this->view->err = 'Hãy chắc chắn bạn nhập đúng password';
        $isValid = false;

      } else {
        $newUser->password = $password;
      }
    }

    // validate email
    if (isset($_POST['email'])) {
      $email = trim($_POST['email']);
      $lenOfEmail = strlen($email);
      if ($lenOfEmail == 0) {
        $this->view->err = 'Bạn cần nhập email';
        $isValid = false;

      } else if (!$this->_isEmail($email)) {
        $this->view->err = 'Địa chỉ email không hợp lệ';
        $isValid = false;

      } else {
        $newUser->email = $email;
      }

    } else {
      $this->view->err = 'Bạn cần nhập email';
      $isValid = false;
    }

    // validate firstname
    if (isset($_POST['firstname'])) {
      $firstname = trim($_POST['firstname']);
      $lenOfFname = strlen($firstname);
      if ($lenOfFname == 0) {
        $this->view->err = 'Bạn cần nhập Tên';
        $isValid = false;

      } else {
        $newUser->firstname = $firstname;
      }

    } else {
      $this->view->err = 'Bạn cần nhập Tên';
      $isValid = false;
    }

    // validate lastname
    if (isset($_POST['lastname'])) {
      $lastname = trim($_POST['lastname']);
      $lenOfLname = strlen($lastname);
      if ($lenOfLname == 0) {
        $this->view->err = 'Bạn cần nhập Họ';
        $isValid = false;

      } else {
        $newUser->lastname = $lastname;
      }

    } else {
      $this->view->err = 'Bạn cần nhập Họ';
      $isValid = false;
    }

    if ($isValid) {
      $result = $this->model->addNewUser($newUser);

      $this->view->result = ($result->successful)
        ? 'Đăng kí thành công'
        : 'Xảy ra lỗi trong quá trình xử lí';

      $this->view->render('signup/signup-result');

    } else {
      $this->view->render_search_page_template('signup/index');
    }
    // $this->model->signup($_POST['email'], $_POST['password']);
  }

  private function _initUser() {
    ob_start();
    $newUser->firstname = null;
    $newUser->lastname = null;
    $newUser->email = null;
    $newUser->password = null;
    $newUser->tel = null;
    $newUser->mobile = null;
    $newUser->role = 'guest';
    $newUser->avatarId = null;
    ob_end_clean();

    return $newUser;
  }

  private function _isMobileNumber($number) {
    return preg_match("/^(0|\+84)\d{9,10}$/", $number);
  }

  private function _isEmail($email) {
    return preg_match("/^\S+@\S+\.\S+$/", $email);
  }

  // public function logout() {
  //   Session::destroy();
  //   header('Location: ../login');
  //   exit;
  // }

}

 ?>
