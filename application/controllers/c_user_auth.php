<?php if (defined('BASEPATH') OR exit('No direct script access allowed'));

class c_user_auth extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->library(array('session' , 'form_validation' ));
  }

  public function index(){
    $data = array('title' => 'Login' );
    $this->load->view('template/auth_header', $data);
    $this->load->view('user_auth/v_user_login');
    $this->load->view('template/auth_footer');
  }
}
