<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_user_register extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper(array('html', 'form'));
    $this->load->model(array('m_user'));
  }

  function index(){
    $this->register_load();
  }

  function register_load(){
    $data = array(
      "title" => "Registration"
    );

    $this->load->view('template/auth_header', $data);
    $this->load->view('user_auth/v_user_register');
    $this->load->view('template/auth_footer');
  }

  function register_complete_load(){
    $data = array(
      "title" => "Registration Completed"
    );

    $this->load->view('template/auth_header', $data);
    $this->load->view('user_auth/v_user_register_complete');
    $this->load->view('template/auth_footer');
  }

  function register_process(){
    $this->form_validation->set_rules('in_reg_username', 'Username', 'required');
    $this->form_validation->set_rules('in_reg_email', 'Email Address', 'required');
    $this->form_validation->set_rules('in_reg_password', 'Password', 'required');
    $this->form_validation->set_rules('in_reg_password_conf', 'Password Confirm', 'required|matches[in_reg_password]');
    $this->form_validation->set_rules('in_reg_firstname', 'Firstname', 'required');
    $this->form_validation->set_rules('in_reg_lastname', 'Lastname', 'required');
    $this->form_validation->set_rules('in_reg_std_no', 'Student Number', 'required');

    if($this->form_validation->run()){
      $data = array(
        'user_name'       =>  $this->input->post('in_reg_username'),
        'user_password'   =>  sha1($this->input->post('in_reg_password')),
        'user_std_id'     =>  $this->input->post('in_reg_std_no'),
        'user_email'      =>  $this->input->post('in_reg_email'),
        'user_first_name' =>  $this->input->post('in_reg_firstname'),
        'user_last_name'  =>  $this->input->post('in_reg_lastname'),
        'user_gender'     =>  $this->input->post('in_reg_title'),
        'user_role'       =>  'S',
        'user_status'     =>  'I'
      );

      if($this->m_user->create_user($data)){
        $this->register_complete_load();
      }
      else{
        $this->index();
      }
    }
    else{
      print_r('error');
    }
  }

}
