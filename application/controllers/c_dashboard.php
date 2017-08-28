<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('m_user'));
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
    $username = $this->session->userdata('user_name');
    $data = array(
      'title'     =>  "Dashboard",
      'user_obj'  =>  $this->m_user->get_user($username)
      );
    $this->load->view('template/app_header', $data);
    $this->load->view('dashboard/v_dashboard');
    $this->load->view('template/app_footer');

  }

}
