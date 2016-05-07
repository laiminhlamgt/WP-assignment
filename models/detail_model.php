<?php
class DetailModel extends Model {

  public function __construct() {
    parent::__construct();
  }

  public function selectPost($postId) {
    $sql = 'SELECT * FROM house WHERE id=:id';
    $bindValue = array(
      'id'=> $postId
    );
    return $this->db->select($sql, $bindValue);
  }

}




 ?>
