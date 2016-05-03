<?php

class GalleryModel extends Model {

  public function __construct() {
    parent::__construct();
  }

  public function insert_image($image,$user_id = 1)
  {
  	$height = 0;
  	$width = 0;

	list($width, $height) = getimagesize($image);
  	//$data = addslashes(file_get_contents($image));
  	$data = file_get_contents($image);

  	$bindValue = array(
        'data' => $data,
        'height' => $height,
        'width' => $width,
        'user_id' =>  $user_id
    );
      
      return $this->db->insert('gallery', $bindValue);
  }

  public function get_image($img_id, $user_id) {
  	if($img_id > 0 && $user_id > 0)
  	{
	    $sql = 'select * from gallery
	      where id=:img_id and user_id=:user_id and active=:active';
	    $bindValue = array(
	      'img_id' => $img_id,
	      'user_id' => $user_id,
	      'active' => 1
	    );

	    $data = $this->db->select($sql, $bindValue);
	    // print_r($data); die; //$query->rowCount();
	    $count = count($data);
	    // echo $count; die;
	    if ($count > 0) {
			$result = $data[0];
			if($user_id == 1 || $result["user_id"] == $user_id)
				return $result;
			else 
				return null;
	    }
	    else
	    {
	    	return null;
	    }
	}
	else
	{
		return null;
	}
  }

}


 ?>