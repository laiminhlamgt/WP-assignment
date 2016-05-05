<?php

class SearchModel extends Model {

  public function __construct() {
    parent::__construct();
  }

  public function selectAll() {
    $sql = 'SELECT * FROM house';
    return $this->db->select($sql);
  }

}


 ?>
