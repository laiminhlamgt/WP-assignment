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

}


 ?>
