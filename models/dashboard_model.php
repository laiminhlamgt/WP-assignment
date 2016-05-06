<?php

class DashboardModel extends Model {

  function __construct() {
    parent::__construct();
  }

  function list_all_users($page=0,$numberOfRecords = 10)
  {
    ob_start();
    $result = null;

    $sql = 'select count(*) from user
      where active = :active';
    $bindValue = array(
      'active' => 1
    );

    $data = $this->db->select($sql, $bindValue, PDO::FETCH_BOTH); 

    $result->total_page = count($data) > 0 ? CEIL($data[0][0]/$numberOfRecords) : 0;
    $result->current_page = $page;



    //Duong Tran 2016 0425 note that dont know why bind value to limit offset not work.

    // $sql2 = 'select id,role,first_name, last_name, telephone_number, mobile_number, email from user
    //   where active = :active limit :numberOfRecords offset :startIndex';
    // $bindValue2 = array(
    //   'active' => 1,
    //   'startIndex' => $page * $numberOfRecords,
    //   'numberOfRecords' => $numberOfRecords
    // );

    $sql2 = 'select id,role,first_name, last_name, telephone_number, mobile_number, email from user
      where active = :active limit ' . $numberOfRecords .  ' offset ' . $page * $numberOfRecords;
      
    $bindValue2 = array(
      'active' => 1
    );

    $data2 = $this->db->select($sql2, $bindValue2);  
    $result->data = count($data2) > 0 ? $data2 : null;


    ob_end_clean();
    return $result;
  }

  function list_all_posts($page = 0, $numberOfRecords = 10)
  {
    ob_start();
    $result = null;

    $sql = 'select count(*) from house
      where active = :active';
    $bindValue = array(
      'active' => 1
    );

    $data = $this->db->select($sql, $bindValue, PDO::FETCH_BOTH); 

    $result->total_page = count($data) > 0 ? CEIL($data[0][0]/$numberOfRecords) : 0;
    $result->current_page = $page;



    //Duong Tran 2016 0425 note that dont know why bind value to limit offset not work.

    // $sql2 = 'select id,role,first_name, last_name, telephone_number, mobile_number, email from user
    //   where active = :active limit :numberOfRecords offset :startIndex';
    // $bindValue2 = array(
    //   'active' => 1,
    //   'startIndex' => $page * $numberOfRecords,
    //   'numberOfRecords' => $numberOfRecords
    // );

    $sql2 = 'select h.id, h.post_title, h.post_description, h.picture1_id, h.picture2_id, h.created, CONCAT(u.first_name, " ", u.last_name) AS full_name, u.avatar_id from house h left join user u on h.user_id = u.id
      where h.active = :active limit ' . $numberOfRecords .  ' offset ' . $page * $numberOfRecords;
      
    $bindValue2 = array(
      'active' => 1
    );

    $data2 = $this->db->select($sql2, $bindValue2);  
    $result->data = count($data2) > 0 ? $data2 : null;


    ob_end_clean();
    return $result;
  }

  function get_user_model_by_id($id)
  {
    $sql = 'select id,role ,first_name, last_name, telephone_number, mobile_number, email, avatar_id from user
      where active = :active and id = :id';
    $bindValue = array(
      'active' => 1,
      'id' => $id
    );

    $data = $this->db->select($sql, $bindValue);    
    return count($data) > 0 ? $data : null; 
  }


  function get_user_model_by_email($email)
  {
    $sql = 'select id,role ,first_name, last_name, telephone_number, mobile_number, email, avatar_id from user
      where active = :active and email = :email';
    $bindValue = array(
      'active' => 1,
      'email' => $email
    );

    $data = $this->db->select($sql, $bindValue);    
    return count($data) > 0 ? $data : null; 
  }

  function create_new_user($email,$password,$first_name,$last_name,$telephone_number, $mobile_number,$role, $imgId)
  {
    $bindValue = array(
        'email' => $email,
        'password' => Hash::create('md5', $password, HASH_PASSWORD_KEY),
        'first_name' => $first_name != null ? $first_name : '',
        'last_name' => $last_name != null ? $last_name : '',
        'telephone_number' => $telephone_number != null ? $telephone_number : '',
        'mobile_number' => $mobile_number != null ? $mobile_number : '',
        'role' => $role != null ? $role : 'guest',//default is guest , Duong Tran noted that the role need verify first.
        'avatar_id' => $imgId != null ? $imgId : 0
        );
      
      return $this->db->insert('user', $bindValue);
  }

  function update_user($id, $password,$first_name,$last_name,$telephone_number,$mobile_number,$role, $imgId)
  {
    if($password != null && $password != '')
    {
      $bindValue = array(
        'password' => Hash::create('md5', $password, HASH_PASSWORD_KEY),
        'first_name' => $first_name != null ? $first_name : '',
        'last_name' => $last_name != null ? $last_name : '',
        'telephone_number' => $telephone_number != null ? $telephone_number : '',
        'mobile_number' => $mobile_number != null ? $mobile_number : '',
        'role' => $role != null ? $role : 'guest',//default is guest , Duong Tran noted that the role need verify first.
        'avatar_id' => $imgId != null ? $imgId : 0
        );

      return $this->db->update('user', $bindValue,'id=' . $id); 
    }
    else  
    {
      $bindValue = array(
        
        'first_name' => $first_name != null ? $first_name : '',
        'last_name' => $last_name != null ? $last_name : '',
        'telephone_number' => $telephone_number != null ? $telephone_number : '',
        'mobile_number' => $mobile_number != null ? $mobile_number : '',
        'role' => $role != null ? $role : 'guest',//default is guest , Duong Tran noted that the role need verify first.
        'avatar_id' => $imgId != null ? $imgId : 0
        );

      return $this->db->update('user', $bindValue,'id=' . $id); 
    }  
      
  }

  function delete_user_by_id($id)
  {
    $bindValue = array(
      'active' => 0
    );

    return $this->db->update('user',$bindValue, 'id=' .$id);
  }
}


 ?>
