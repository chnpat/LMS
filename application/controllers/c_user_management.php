<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_user_management extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model(array('m_user'));
    $this->load->library(array('form_validation'));
  }

  function index(){
    // This controller allows only logged-in users and users with "Administrator" role only
    $user_obj = $this->m_user->get_user($this->session->userdata('user_name'));

    if($this->session->userdata('LOGGED_IN') && $user_obj['user_role'] == "A"){
      $this->user_management_list_load();
    }
    else{
      echo "<script type='text/javascript'>window.location='".base_url()."c_user_auth/index'</script>";
    }
  }

  function add(){
    echo "<script type='text/javascript'>window.location='".base_url()."c_user_detail/index'</script>";
  }

  function delete($id){
    $result = $this->m_user->delete_user($id);
    if($result){
      $this->session->set_flashdata('user_list_msg','ผู้ใช้งานรหัส: '.$id.' ถูกลบออกจากระบบเรียบร้อยแล้ว');
    }
    else{
      $this->session->set_flashdata('user_list_err','ผู้ใช้งานรหัส: '.$id.' ไม่สามารถถูกลบออกจากระบบได้');
    }
    echo "<script type='text/javascript'>window.location='".base_url()."c_user_management/index'</script>";
  }

  function edit($id){
    echo "<script type='text/javascript'>window.location='".base_url()."c_user_detail/edit/".$id."'</script>";
  }

  function change_password(){
    if($this->session->userdata('LOGGED_IN')){
      $this->change_password_view_load();
    }
    else{
      echo "<script type='text/javascript'>window.location='".base_url()."c_user_auth/index'</script>";
    }
  }

  function update_status($id, $status){
    $result = $this->m_user->update_status_user($id, $status);
    echo "<script type='text/javascript'>window.location='".base_url()."c_user_management/index'</script>";
  }

  function user_management_list_load(){
    $username = $this->session->userdata('user_name');
    $data = array(
      'title'       =>  'User List',
      'user_obj'    =>  $this->m_user->get_user($username)
    );

    $this->load->view('template/app_header', $data);
    $this->load->view('user_management/v_user_list');
    $this->load->view('template/app_footer');
  }

  function change_password_view_load(){
    $username = $this->session->userdata('user_name');

    $data = array(
      'title'       =>  'Change Password',
      'user_obj'    =>  $this->m_user->get_user($username)
    );

    $this->load->view('template/app_header', $data);
    $this->load->view('user_management/v_user_change_password', $data);
    $this->load->view('template/app_footer');
  }

  function fetch_user(){
    $draw   = intval($this->input->get("draw"));
    $start  = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));

    $fetch_data = $this->m_user->get_user_dt();
    $data = array();
    foreach ($fetch_data->result() as $row) {

      // Generate String Label for User Role
      if($row->user_role == "A"){
        $role_label = "<div class='text-center'><span class='label label-success text'>ผู้ดูแลระบบ</span></div>";
      }
      else if($row->user_role == "S"){
        $role_label = "<div class='text-center'><span class='label label-warning'>นิสิต/นักศึกษา</span></div>";
      }
      else{
        $role_label = "<div class='text-center'><span class='label label-danger'>อาจารย์ผู้สอน</span></div>";
      }

      // Generate Symbol for User Status
      if($row->user_status == "A"){
        $status_sym = "<div class='text-center'><span class='text text-green'><i class='fa fa-check-circle'></i></span></div>";
      }
      else{
        $status_sym = "<div class='text-center'><span class='text text-red'><i class='fa fa-times-circle'></i></span></div>";
      }


      // Generate Button for Active/Inactive User Status
      if($row->user_status == "A"){
        $status_btn = "<a href='update_status/".$row->user_id."/I' class='btn btn-info'><i class='fa fa-user-times'></i> ปิดบัญชี</a>";
      }
      else{
        $status_btn = "<a href='update_status/".$row->user_id."/A' class='btn btn-success'><i class='fa fa-user-plus'></i> เปิดบัญชี</a>";
      }

      $record = array();
      $record[] = "<div class='text-center'><b>".$row->user_id."</b></div>";
      $record[] = "<div class='text-center'>".$row->user_name."</div>";
      $record[] = $row->user_first_name;
      $record[] = $row->user_last_name;
      $record[] = $role_label;
      $record[] = $status_sym;
      $record[] = "<a href='edit/".$row->user_id."' class='btn btn-warning'><i class='fa fa-edit'></i> แก้ไข</a>";
      $record[] = ($row->user_id != 1)? $status_btn:"";
      $record[] = ($row->user_id != 1)?"<a data-href='delete/".$row->user_id."' class='btn btn-danger' data-toggle='modal' data-target='#delete-user-confirm'><i class='fa fa-remove'></i> ลบผู้ใช้งาน</a>":"";
      $data[] = $record;
    }
    $output = array(
        "draw"                =>     $draw,
        "recordsTotal"        =>     $fetch_data->num_rows(),
        "recordsFiltered"     =>     $fetch_data->num_rows(),
        "data"                =>     $data
    );
    echo json_encode($output);
    exit();
  }
  function change_password_proc($id){
    $this->form_validation->set_rules('in_cp_old', 'Old Password', 'required');
    $this->form_validation->set_rules('in_cp_new', 'New Password', 'required');
    $this->form_validation->set_rules('in_cp_new_conf', 'New Password Confirm', 'required|matches[in_cp_new]');
    if($this->form_validation->run()){
      $old = sha1($this->input->post('in_cp_old'));
      $new = sha1($this->input->post('in_cp_new'));
      if($this->m_user->update_user_password($id, $old, $new)){
        $this->session->set_flashdata('change_password_msg', "รหัสผ่านถูกเปลี่ยนเรียบร้อยแล้ว");
        echo "<script type='text/javascript'>window.location='".base_url()."c_user_management/change_password'</script>";
      }
      else{
        $this->session->set_flashdata('change_password_err', "รหัสผ่านไม่สามารถเปลี่ยนได้");
        echo "<script type='text/javascript'>window.location='".base_url()."c_user_management/change_password'</script>";
      }
    }
    else{
      $this->session->set_flashdata('change_password_err', "รหัสผ่านไม่สามารถเปลี่ยนได้");
      echo "<script type='text/javascript'>window.location='".base_url()."c_user_management/change_password'</script>";
    }
  }
  function logout(){
    $this->session->unset_userdata('LOGGED_IN');
    $this->session->unset_userdata('user_name');
    $this->session->sess_destroy();

    echo "<script type='text/javascript'>alert('ออกจากระบบเรียบร้อยแล้ว!')</script>";

    echo "<script type='text/javascript'>window.location='".base_url()."c_user_auth'</script>";
  }
}
