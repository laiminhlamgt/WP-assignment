<?php

class Gallery extends Controller {

  public function __construct() {
    parent::__construct();
    Session::init();
  }

  public function upload() {
    ob_start();
    $response->status=false;

    $role = Session::get('role');
    if ($role == 'admin' || $role == 'guest') {

     if(!isset($_FILES['image']))
     {
      $response->message = 'not found any image posted';
    }
    else
    {	

      $result = $this->model->insert_image($_FILES['image']['tmp_name'],Session::get('userId'));

      if($result->successful == false)
      {
       $response->message = $result->message;
     }
     else
     {
       $imgId = $result->id;
       $response->status = true;
       $response->data = $this->generate_image_content($imgId);
     }
   }
 }
 else
 {
  $response->message = 'you have no access right for upload image';
}
ob_end_clean();
echo json_encode($response);
}

public function generate_image_content($id)
{
 $result = null;

 //$role = Session::get('role');
 //if ($role == 'admin' || $role == 'guest') {
   $imgdata = $this->model->get_image($id);
   if($imgdata != null)
   {
     header("Content-type: image/png");
     $result->src = 'data:image/png;base64,' . base64_encode($imgdata["data"]);
     $result->width = $imgdata["width"];
     $result->height = $imgdata["height"];
     $result->id = $id;
   }
 //}
 return $result;
}

public function generate_image_content_ajax()
{
 ob_start();
 $response->status=false;
 if(!isset($_GET['imgId']))
 {
  $response->message = 'not found image id';
 }
else
{
 $id = $_GET['imgId'];
 $data = $this->generate_image_content($id);
 if($data != null)
 {
  $response->status = true;
  $response->data = $data;
}
else
{
  $response->message = '';
}
}
ob_end_clean();
echo json_encode($response);
}

}
?>
