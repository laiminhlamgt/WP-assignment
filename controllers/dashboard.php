<?php

class Dashboard extends Controller {

  public function __construct() {
    parent::__construct();
    Session::init();

    $logged = Session::get('loggedIn');
    if ($logged == false) {
      Session::destroy();
      header('Location: login');
      exit;
    }
    // print_r($_SESSION);
  }

  public function index() {
    $role = Session::get('role');
    if ($role != 'admin') {
      header('Location: index');
      exit;
    }
    
    $this->chart();
    //$this->view->dashboard_render('index');
  }

  public function chart(){
    $role = Session::get('role');
    if ($role != 'admin') {
      header('Location: index');
      exit;
    }

    $chart_name = empty($_GET['chartname']) == false ? $_GET['chartname'] : 'site-visit-chart';

    $this->view->title = 'Admin';
    $this->view->chart_name= $chart_name;
    $this->view->dashboard_render('chart');
  }

  public function list_users(){
    $role = Session::get('role');
    if ($role != 'admin') {
      header('Location: index');
      exit;
    }

    $is_ajax_call = isset($_GET['page']);

    $page = (isset($_GET['page']) && !empty($_GET['page'])) ? $_GET['page'] : 0;
    $page = ($page != null && is_numeric ($page)) ? $page : 0;

    $this->view->title ='Admin';
    $this->view->model = $this->model->list_all_users($page);
    $this->view->dashboard_render('list_users',DashboardFileDirEnum::ROOT,$is_ajax_call);    

  }

  public function user_edit_form()
  {
    $role = Session::get('role');
    if ($role != 'admin') {

      $this->view->status = false;
      $this->view->error_message = "You have no access right for editing user";
      $this->view->dashboard_render('user_edit_form',DashboardFileDirEnum::ROOT,true);
      exit;
    }

    $id = isset($_GET['id']) ? $_GET['id'] : null;

    if($id == null)
    {
      $this->view->status = false;
      $this->view->error_message = "The request does not contain user id";

    } 
    else if($id == 0)//create new
    {  
      $this->view->model = null;
      $this->view->title ='Create User';
    }
    else
    {
      $this->view->model = $this->model->get_user_model_by_id($id);
      if($this->view->model == null)
      {
        $this->view->status = false;
        $this->view->error_message = 'This user is not exists !';
      }
      else
      {
        $this->view->title ='Edit User';
      }
    }

    $this->view->dashboard_render('user_edit_form',DashboardFileDirEnum::ROOT,true);
  }

  //the method just called by ajax
  function create_or_edit_user()
  {
    ob_start();
    
    $role = Session::get('role');
    if ($role != 'admin') {

      $response->status = false;
      $response->message = "You have no access right for editing user";
      ob_end_clean();
      echo json_encode($response);
      exit;
    }

    $id = isset($_POST['id']) ? $_POST['id'] : null;

    if($id == null)
    {
      $response->status = false;
      $response->message = "The request does not contain user id";
      ob_end_clean();
      echo json_encode($response);
      exit;
    }
    else if($id == 0) // create new user
    {
      //required data

      $email = $_POST['email'];
      $password = $_POST['password'];
      
      if(empty($email) || empty($password))
      {
        $response->status = false;
        $response->message =  "The email and password is required to create an new user";
        ob_end_clean();
        echo json_encode($response);

        exit;
      }
      //check if the email is existed
      $sameEmailUsers = $this->model->get_user_model_by_email($_POST['email']);
      if($sameEmailUsers != null)
      {
        $response->status = false;
        $response->message =  'The email has been existed ';
        ob_end_clean();
        echo json_encode($response);
        exit;
      }
      else
      {
        $result = $this->model->create_new_user($_POST['email'],$_POST['password'],$_POST['first_name'],
          $_POST['last_name'],$_POST['telephone_number'], $_POST['mobile_number'], $_POST['role'], $_POST['avatar']);
        if($result->successful == false)
        {
          $response->status = false;
          $response->message =  $result->message;
          ob_end_clean();
          echo json_encode($response);
          exit;
        }
        else
        {

          $response->status = true;
          $response->message = '';
          $createdUser = $this->model->get_user_model_by_email($_POST['email']);
          $response->new_id = $createdUser[0]['id']; 
          ob_end_clean();
          echo json_encode($response);
          exit;
        }
      }
    }
    else { //update
      
      $this->view->model = $this->model->get_user_model_by_id($id);
      if($this->view->model == null)
      {
        $response->status = true;
        $response->message =  "The user is not existed";
        ob_end_clean();
        echo json_encode($response);
        exit;
      }
      else
      {
        $result = $this->model->update_user($_POST['id'],$_POST['password'],$_POST['first_name'],
          $_POST['last_name'],$_POST['telephone_number'], $_POST['mobile_number'], $_POST['role'],$_POST['avatar']);
        if($result->successful == false)
        {
          $response->status = false;
          $response->message =  $result->message;
          ob_end_clean();
          echo json_encode($response);
          exit;  
        }
        else
        {
          $response->status = true;
          $response->message =  '';
          ob_end_clean();
          echo json_encode($response);
          exit; 
        }

      }
    }
  }

  function delete_user()
  {
    ob_start();
    $response = null;

    $role = Session::get('role');
    if ($role != 'admin') {

      $response->status = false;
      $response->message = "You have no access right for editing user";
      ob_end_clean();
      echo json_encode($response);
      exit;
    }

    if(!isset($_POST['id']))
    {
      $response->status = false;
      $response->message = "The request dose not contain user id";
      ob_end_clean();
      echo json_encode($response);
      exit; 
    }

    $this->view->model = $this->model->get_user_model_by_id($_POST['id']);
    if($this->view->model == null)
    {
      $response->status = false;
      $response->message =  "The user is not existed";
      ob_end_clean();
      echo json_encode($response);
      exit;
    }

    $result = $this->model->delete_user_by_id($_POST['id']);
    if($result->successful==false)
    {
      $response->status = false;
      $response->message =  $result->message;
      ob_end_clean();
      echo json_encode($response);
      exit; 
    }

    $response->status = true;
    ob_end_clean();
    echo json_encode($response);
  }

}

?>
