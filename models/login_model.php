<?php

class LoginModel extends Model {

  public function __construct() {
    parent::__construct();
  }

  public function login($email, $password) {
    $sql = 'SELECT id,role FROM user
      WHERE email=:email AND password=:password';
    $bindValue = array(
      'email' => $email,
      'password' => Hash::create('md5', $password, HASH_PASSWORD_KEY)
    );

    return $this->db->select($sql, $bindValue);
  }

}


 ?>
