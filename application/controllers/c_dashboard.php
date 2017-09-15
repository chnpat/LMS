<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('m_user', 'm_admin_config'));
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
      'user_obj'  =>  $this->m_user->get_user($username),
      );

    $config = array(
      'announce_title'  =>  $this->m_admin_config->get_config(1)['config_value'],
      'announce_detail' =>  $this->m_admin_config->get_config(2)['config_value']
    );

    $this->load->view('template/app_header', $data);
    $this->load->view('dashboard/v_dashboard', $config);
    $this->load->view('template/app_footer');

  }

}
