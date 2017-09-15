<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_user_management extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model(array('m_user'));
    $this->load->library(array('pagination', 'table'));
  }

  function index(){
    if($this->session->userdata('LOGGED_IN')){
      $this->user_management_list_load();
    }
    else{
      echo "<script type='text/javascript'>window.location='".base_url()."c_user_auth/index'</script>";
    }
  }

  function user_management_list_load(){
    $username = $this->session->userdata('user_name');
    $data = array(
      'title'       =>  'User List',
      'user_obj'    =>  $this->m_user->get_user($username)
    );

    $config = array();
    $config["base_url"] = base_url() . "c_user_management/index";
    $config["total_rows"] = $this->m_user->get_user_all_count();
    $config["per_page"] = 20;
    $choice = $config['total_rows'] / $config['per_page'];
    $config['num_links'] = (round($choice) > 8)? 10: round($choice);
    $config["uri_segment"] = 3;

    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] ="</ul>";

    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';

    $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
    $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";

    $config['next_link'] = 'ถัดไป &rarr;';
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";

    $config['prev_link'] = '&larr; ก่อนหน้า';
    $config['prev_tag_open'] = "<li class='prev page'>";
    $config['prev_tagl_close'] = "</li>";

    $config['first_link'] = '&laquo; หน้าแรก';
    $config['first_tag_open'] = "<li class='prev page'>";
    $config['first_tagl_close'] = "</li>";

    $config['last_link'] = 'หน้าสุดท้าย &raquo;';
    $config['last_tag_open'] = "<li class='next page'>";
    $config['last_tagl_close'] = "</li>";

    $this->pagination->initialize($config);

    $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0 ;

    $user_data = array(
      'user_arr'    =>  $this->m_user->get_user_all_paging($config['per_page'], $page),
      'user_count'  =>  $this->m_user->get_user_all_count(),
      'links'       =>  $this->pagination->create_links(),
      'start'       =>  $page,
      'limit'       =>  $config['per_page']
    );

    $this->load->view('template/app_header', $data);
    $this->load->view('user_management/v_user_list', $user_data);
    $this->load->view('template/app_footer');
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
