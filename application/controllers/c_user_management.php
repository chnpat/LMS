<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_user_management extends CI_Controller{

  public function __construct(){
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index(){
    //TODO: Call Function User List load
  }

  function change_password(){
    //TODO: Call Function Change Password view Load
  }

  function logout(){
    $this->session->unset_userdata('LOGGED_IN');
    $this->session->unset_userdata('user_name');
    $this->session->sess_destroy();

    echo "<script type='text/javascript'>alert('ออกจากระบบเรียบร้อยแล้ว!')</script>";

    echo "<script type='text/javascript'>window.location='".base_url()."c_user_auth'</script>";
  }
}
