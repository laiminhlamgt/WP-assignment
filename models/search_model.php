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
    $sql = 'SELECT * FROM house WHERE user_id=:user_id';
    $bindValue = array(
      'user_id' => $userId
    );
    return $this->db->select($sql, $bindValue);
  }

  public function selectPost($postId) {
    $sql = 'SELECT * FROM house WHERE user_id=:user_id';
    $bindValue = array(
      'user_id' => $userId,
      'id'=> $postId
    );
    return $this->db->select($sql, $bindValue);
  }

}


 ?>
