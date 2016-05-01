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

}


 ?>
