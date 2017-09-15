<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_admin_config extends CI_Model{

  public function __construct(){
    parent::__construct();

  }

  //TODO: Adds a create function for admin config

  public function get_config($config_id){
    $query = $this->db->query(
      ' SELECT  *
        FROM    M_ADMIN_CONFIG
        WHERE   config_id = '.$config_id
    );
    if($query->num_rows() == 1){
      return $query->result_array()[0];
    }
    else{
      return false;
    }
  }

  public function get_config_all(){
    $query = $this->db->query(
      ' SELECT  *
        FROM    M_ADMIN_CONFIG'
    );
    if($query->num_rows() > 0){
      return $query->result_array();
    }
    else{
      return false;
    }
  }

  //TODO: Adds an update function for admin config
  function update_config($data){
    $query = $this->db->query(
      ' UPDATE  M_ADMIN_CONFIG
        SET     config_value = "'.$data['config_value'].'"
        WHERE   config_id = '.$data['config_id']
    );
    if($this->db->affected_rows() == 1){
      return true;
    }
    else{
      return false;
    }
  }

  //TODO: Adds a delete function for admin config
}
