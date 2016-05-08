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

    $result = $this->db->insert('user', $bindValue);
    if ($result->successful ) {
      header('location: ../index');

    } else { //Duog Tran noted that when the registration failed system better show message instead direnct page.
      header('location: ../signup');
    }

  }

  public function addNewUser($newUser) {
    $bindValue = array(
      'first_name' => $newUser->firstname,
      'last_name' => $newUser->lastname,
      'email' => $newUser->email,
      'password' => Hash::create('md5', $newUser->password, HASH_PASSWORD_KEY),
      'telephone_number' => $newUser->tel,
      'mobile_number' => $newUser->mobile,
      'role' => $newUser->role,
      'active' => '1',
      'avatar_id' => $newUser->avatarId
    );

    return $this->db->insert('user', $bindValue);
  }

  public function selectUser($email) {
    $sql = 'SELECT * FROM user WHERE email=:email';
    $bindValue = array(
      'email' => $email
    );

    return $this->db->select($sql, $bindValue);
  }

}

 ?>
