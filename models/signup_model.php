<?php

class SignupModel extends Model {

  public function __construct() {
    parent::__construct();
  }

  public function signup($email, $password) {
    $bindValue = array(
      'email' => $email,
      'password' => Hash::create('md5', $password, HASH_PASSWORD_KEY),
    );

    $inserted = $this->db->insert('user', $bindValue);
    if ($inserted) {
      header('location: ../index');

    } else {
      header('location: ../signup');
    }

  }

}

 ?>
