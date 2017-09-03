<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_admin_config extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model(array('m_user','m_admin_config'));
    $this->load->library('form_validation');
  }

  function index(){
    if($this->session->userdata('LOGGED_IN')){
      $this->admin_config_load();
    }
    else{
      echo "<script type='text/javascript'>window.location='".base_url()."c_user_auth'</script>";
    }
  }

  function admin_config_load(){
    $username   = $this->session->userdata('user_name');
    $data       = array(
      'title'     =>  'Admin Config',
      'user_obj'  =>  $this->m_user->get_user($username)
     );

     $configs = array('configs' =>  $this->m_admin_config->get_config_all());

     $this->load->view('template/app_header', $data);
     $this->load->view('config/v_admin_config',$configs );
     $this->load->view('template/app_footer');
  }

  function update_config(){
    $config_arr = $this->m_admin_config->get_config_all();
    foreach ($config_arr as $key => $config) {
      $this->form_validation->set_rules('admin_config_val_'.$config['config_id'], 'Config '.$config['config_id'], 'required');
      if($this->form_validation->run()){
        $conf_val = $this->input->post('admin_config_val_'.$config['config_id']);
        if($conf_val != $config['config_value']){
          $config['config_value'] = $conf_val;
          $this->m_admin_config->update_config($config);
        }
      }
    }
    $this->index();
  }

}
