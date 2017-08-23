<?php if (defined('BASEPATH') OR exit('No direct script access allowed'));

class c_user_auth extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper(array('html', 'form'));
    $this->load->model(array('m_user'));
  }

  function index(){
    if($this->session->userdata('LOGGED_IN')){
      echo "<script type='text/javascript'>window.location='".base_url()."c_dashboard/index'</script>";
    }
    else{
      $this->login_load();
    }
  }

  function login_load(){
    $data = array('title' => 'Login' );
    $this->load->view('template/auth_header', $data);
    $this->load->view('user_auth/v_user_login');
    $this->load->view('template/auth_footer');
  }

  function login_process(){
    $this->form_validation->set_rules('in_user_name', 'Username', 'required');
    $this->form_validation->set_rules('in_user_password', 'Password', 'required');
    if($this->form_validation->run()){
      $username = $this->input->post('in_user_name');
      $password = sha1($this->input->post('in_user_password'));

      if($this->m_user->login_user($username, $password)){
        $sess_info = array(
          'user_name' => $username,
          'LOGGED_IN' => true);
        $this->session->set_userdata($sess_info);
        echo "<script type='text/javascript'>alert('ลงชื่อเข้าใช้งานเรียบร้อยแล้ว!')</script>";
				$this->index();
      }
      else{
        echo "<script type='text/javascript'>alert('ผิดพลาด! ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง')</script>";
        $this->index();
      }
    }
  }
}
