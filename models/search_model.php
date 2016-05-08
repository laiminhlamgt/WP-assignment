<?php

class SearchModel extends Model {

  public function __construct() {
    parent::__construct();
  }

  public function selectAll() {
    $sql = 'SELECT * FROM house';
    return $this->db->select($sql);
  }

  public function selectPostOfUser($userId) {
    $sql = 'SELECT * FROM house WHERE user_id=:user_id AND active=:active';
    $bindValue = array(
      'user_id' => $userId,
      'active' => '1'
    );
    return $this->db->select($sql, $bindValue);
  }

  public function searchPostByOption($option) {
    $sql = 'SELECT * FROM house WHERE ';
    $sqlOption = array();
    $bindValue = array();

    if (isset($option['type_of_house_id'])) {
      array_push($sqlOption, 'type_of_house_id=:type_of_house_id');
      $bindValue['type_of_house_id'] = $option['type_of_house_id'];
    }

    if (isset($option['district_id'])) {
      array_push($sqlOption, 'district_id=:district_id');
      $bindValue['district_id'] = $option['district_id'];
    }

    if (isset($option['ward_id'])) {
      array_push($sqlOption, 'ward_id=:ward_id');
      $bindValue['ward_id'] = $option['ward_id'];
    }

    if (isset($option['street_id'])) {
      array_push($sqlOption, 'street_id=:street_id');
      $bindValue['street_id'] = $option['street_id'];
    }

    if (isset($option['min-price'])) {
      array_push($sqlOption, 'price>=:minprice');
      $bindValue['minprice'] = $option['min-price'];
    }

    if (isset($option['max-price'])) {
      array_push($sqlOption, 'price<=:maxprice');
      $bindValue['maxprice'] = $option['max-price'];
    }

    if (isset($option['min-area'])) {
      array_push($sqlOption, 'area>=:minarea');
      $bindValue['minarea'] = $option['min-area'];
    }

    if (isset($option['max-area'])) {
      array_push($sqlOption, 'area<=:maxarea');
      $bindValue['maxarea'] = $option['max-area'];
    }

    if (isset($option['number_of_room'])) {
      array_push($sqlOption, 'number_of_room=:number_of_room');
      $bindValue['number_of_room'] = $option['number_of_room'];
    }

    $sql .= implode(' AND ', $sqlOption);
    return $this->db->select($sql, $bindValue);
  }

  public function searchPostByContent($content) {
    $sql = 'SELECT DISTINCT *
    FROM house h
      LEFT JOIN district d ON h.district_id = d.id
      LEFT JOIN ward w ON h.ward_id = w.id
      LEFT JOIN street s ON h.street_id = s.id
    WHERE h.active = :active
      AND (h.post_title LIKE :likecontent
      OR h.post_description LIKE :likecontent
      OR h.contact_name LIKE :likecontent
      OR h.mobile_number LIKE :likecontent
      OR d.name LIKE :likecontent
      OR w.name LIKE :likecontent
      OR s.name LIKE :likecontent)
    ';

    $bindValue = array(
      'active' => '1',
      'likecontent' => '%' . $content. '%'
    );
    return $this->db->select($sql,$bindValue);
  }

}


 ?>
