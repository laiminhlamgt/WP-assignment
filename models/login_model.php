<?php

class LoginModel extends Model {

  public function __construct() {
    parent::__construct();
  }

  public function login($email, $password) {
    $sql = 'select id,role from user
      where email=:email and password=:password';
    $bindValue = array(
      'email' => $email,
      'password' => Hash::create('md5', $password, HASH_PASSWORD_KEY)
    );

    $data = $this->db->select($sql, $bindValue);
    // print_r($data); die; //$query->rowCount();
    $count = count($data);
    // echo $count; die;
    if ($count > 0) {
      // login successful
      Session::init();
      Session::set('loggedIn', true);
      Session::set('role', $data[0]['role']);
      if ($data[0]['role'] == 'admin') {
        header('location: ../dashboard');
      } else {
        header('location: ../index');
      }

    } else {
      header('location: ../login');
      // TODO: return login failed
    }

  }

}


 ?>
