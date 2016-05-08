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
