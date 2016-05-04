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

  public function getLstWards($district_id) {
    $sql = 'SELECT id, name FROM ward WHERE district_id=:district_id';
    $bindValue = array(
      'district_id' => $district_id,
    );

    return $this->db->select($sql, $bindValue);
  }

  public function getLstStreets($district_id) {
    $sql = 'SELECT id, name FROM street WHERE district_id=:district_id';
    $bindValue = array(
      'district_id' => $district_id,
    );

    return $this->db->select($sql, $bindValue);
  }

  public function getLstProjects($district_id) {
    $sql = 'SELECT id, name FROM project WHERE district_id=:district_id';
    $bindValue = array(
      'district_id' => $district_id,
    );

    return $this->db->select($sql, $bindValue);
  }

  public function getUserInfo($userId) {
    $sql = 'SELECT first_name, last_name, email, telephone_number, mobile_number
      FROM user WHERE id=:id';
    $bindValue = array(
      'id' => $userId
    );

    return $this->db->select($sql, $bindValue)[0];
  }

  public function addNewHouse($newHouse) {
    $bindValue = array(
      'type_of_house_id' => $newHouse->typeOfHouseId,
      'location_id' => $newHouse->locationId,
      'price' => $newHouse->price,
      'area' => $newHouse->area,
      'address' => $newHouse->address,
      'number_of_floor' => $newHouse->numOfFloor,
      'number_of_room' => $newHouse->numOfRoom,
      'number_of_restroom' => $newHouse->numOfRestroom,
      'post_title' => $newHouse->postTitle,
      'post_description' => $newHouse->postDescription,
      'picture1_id' => $newHouse->picture1Id,
      'contact_name' => $newHouse->contactName,
      'contact_address' => $newHouse->contactAddress,
      'telephone_number' => $newHouse->tel,
      'mobile_number' => $newHouse->mobile,
      'email' => $newHouse->email,
      'user_id' => $newHouse->userId
    );

    return $this->db->insert('house', $bindValue);
  }

}


 ?>
