<?php

class PostModel extends Model {

  public function __construct() {
    parent::__construct();
  }

  public function getLstTypeOfHouse() {
    $sql = 'SELECT * FROM type_of_house';
    return $this->db->select($sql);
  }

  public function getLstDistrict() {
    $sql = 'SELECT * FROM district';
    return $this->db->select($sql);
  }

  public function getLstWard($district_id) {
    $sql = 'SELECT id, name FROM ward WHERE district_id=:district_id';
    $bindValue = array(
      'district_id' => $district_id,
    );

    return $this->db->select($sql, $bindValue);
  }

  public function getLstStreet($district_id) {
    $sql = 'SELECT id, name FROM street WHERE district_id=:district_id';
    $bindValue = array(
      'district_id' => $district_id,
    );

    return $this->db->select($sql, $bindValue);
  }

  public function addNewHouse($newHouse) {
    $bindValue = array(
      // 'type_of_house_id' => $newHouse['type_of_house_id'],

      // 'email' => $email,
      // 'password' => Hash::create('md5', $password, HASH_PASSWORD_KEY),
      // 'first_name' => $first_name != null ? $first_name : '',
      // 'last_name' => $last_name != null ? $last_name : '',
      // 'telephone_number' => $telephone_number != null ? $telephone_number : '',
      // 'mobile_number' => $mobile_number != null ? $mobile_number : '',
      // 'role' => $role != null ? $role : 'guest'//default is guest , Duong Tran noted that the role need verify first.
    );

    // return $this->db->insert('user', $bindValue);
  }

}


 ?>
