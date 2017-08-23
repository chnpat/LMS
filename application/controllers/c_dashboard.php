<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    if($this->session->userdata('LOGGED_IN')){
      $this->dashboard_load();

    }
    else{
      echo "<script type='text/javascript'>window.location='".base_url()."c_user_auth'</script>";
    }
  }

  function dashboard_load(){
    $data = array('title' => "Dashboard" );
    $this->load->view('dashboard/v_dashboard.php', $data);
    session_destroy();
  }

}
