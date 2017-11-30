<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_user_detail extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library(array('form_validation'));
    $this->load->model(array('m_user'));
  }

  function index()
  {
    // This controller allows only logged-in users and users with "Administrator" role only
    $user_obj = $this->m_user->get_user($this->session->userdata('user_name'));

    if($this->session->userdata('LOGGED_IN') && $user_obj['user_role'] == "A"){
      $this->user_detail_load($user_obj);
    }
    else{
      echo "<script type='text/javascript'>window.location='".base_url()."c_user_auth/index'</script>";
    }
  }

  function edit($id){
    // This controller allows only logged-in users and users with "Administrator" role only
    $user_obj = $this->m_user->get_user($this->session->userdata('user_name'));

    if($this->session->userdata('LOGGED_IN') && $user_obj['user_role'] == "A"){
      $this->user_detail_load($user_obj, $id);
    }
    else{
      echo "<script type='text/javascript'>window.location='".base_url()."c_user_auth/index'</script>";
    }
  }

  function user_detail_load($user_obj, $id=NULL){
    $data = array(
      'title'     =>  'Update User Account' ,
      'user_obj'  =>  $user_obj
    );
    $this->load->view('template/app_header', $data);

    if($id != NULL){
      $detail_arr = array(
        'user_obj_edit'   =>  $this->m_user->get_user_by_id($id)
      );
    }
    else{
      $detail_arr = array(
        'user_obj_edit'   =>  NULL
      );
    }
    $this->load->view('user_management/v_user_detail', $detail_arr);
    $this->load->view('template/app_footer');

  }

  function create_user(){
    $this->form_validation->set_rules('in_det_username', 'Username', 'required');
    $this->form_validation->set_rules('in_det_email', 'Email Address', 'required');
    $this->form_validation->set_rules('in_det_pass', 'Password', 'required');
    $this->form_validation->set_rules('in_det_pass_conf', 'Password Confirm', 'required|matches[in_det_pass]');
    $this->form_validation->set_rules('in_det_firstname', 'Firstname', 'required');
    $this->form_validation->set_rules('in_det_lastname', 'Lastname', 'required');
    if($this->input->post('in_det_role') == "S"){
      $this->form_validation->set_rules('in_det_studentid', 'Student Number', 'required');
    }
    if($this->form_validation->run()){
      $data = array(
        'user_name'       =>  $this->input->post('in_det_username'),
        'user_email'      =>  $this->input->post('in_det_email'),        
        'user_first_name' =>  $this->input->post('in_det_firstname'),
        'user_last_name'  =>  $this->input->post('in_det_lastname'),
        'user_password'   =>  sha1($this->input->post('in_det_pass')),
        'user_role'       =>  $this->input->post('in_det_role'),
        'user_gender'     =>  $this->input->post('in_det_title'),
        'user_status'     =>  ($this->input->post('in_det_status') == "on")? "A":"I"
      );
      if($this->input->post('in_det_role') == "S"){
        $data['user_std_id'] = $this->input->post('in_det_studentid');
      }
      
      if($this->m_user->create_user($data)){
        $this->session->set_flashdata('user_list_msg', 'บัญชีผู้ใช้งาน: '.$data['user_name'].' ถูกสร้างสำเร็จเรียบร้อยแล้ว');
        echo "<script type='text/javascript'>window.location='".base_url()."c_user_management/index'</script>";
      }
      else{
        $this->session->set_flashdata('user_det_err', 'บัญชีผู้ใช้งาน: '.$data['user_name'].' ไม่สามารถถูกสร้างได้');
        $this->index();
      }
    }
    else{
      $this->session->set_flashdata('user_det_err', 'บัญชีผู้ใช้งาน: '.$this->input->post('in_det_username').' ไม่สามารถถูกสร้างได้'.validation_errors());
      $this->index();
    }
  }

  function update_user($id){
    $this->form_validation->set_rules('in_det_email', 'Email Address', 'required');
    $this->form_validation->set_rules('in_det_firstname', 'Firstname', 'required');
    $this->form_validation->set_rules('in_det_lastname', 'Lastname', 'required');

    if($this->input->post('in_det_role') == "S"){
      $this->form_validation->set_rules('in_det_studentid', 'Student Number', 'required');
    }
    if ($this->form_validation->run()) {
      $data = array(
        'user_email'      =>  $this->input->post('in_det_email'),
        'user_gender'     =>  $this->input->post('in_det_title'),        
        'user_first_name' =>  $this->input->post('in_det_firstname'),
        'user_last_name'  =>  $this->input->post('in_det_lastname'),
        'user_role'       =>  $this->input->post('in_det_role'),
        'user_status'     =>  ($this->input->post('in_det_status')== "on")? "A":"I"
      );
      if($this->input->post('in_det_role') == "S"){
        $data['user_std_id'] = $this->input->post('in_det_studentid');
      }
      if($this->m_user->update_user($id, $data)){
        $this->session->set_flashdata('user_det_msg', 'บัญชีผู้ใช้งาน: '.$data['user_name'].' ถูกแก้ไขเรียบร้อยแล้ว');
        echo "<script type='text/javascript'>window.location='".base_url()."c_user_detail/edit/".$id."'</script>";
      }
      else{
        $this->session->set_flashdata('user_det_err', 'บัญชีผู้ใช้งาน: '.$data['user_name'].' ไม่สามารถแก้ไขได้');
        echo "<script type='text/javascript'>window.location='".base_url()."c_user_detail/edit/".$id."'</script>";
      }
    } else {
      $this->session->set_flashdata('user_det_err', 'บัญชีผู้ใช้งาน: '.$data['user_name'].' ไม่สามารถแก้ไขได้'.validation_errors());
      echo "<script type='text/javascript'>window.location='".base_url()."c_user_detail/edit/".$id."'</script>";
    }
  }

}
