<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_user extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function create_user($data){
    $username   = $data['user_name'];
    $email      = $data['user_email'];

    if($data['user_role'] == "S"){
      $student_no = $data['user_std_id'];
      $query = $this->db->query(
        " SELECT user_id
          FROM M_USER
          WHERE user_name = '".$username."'
            OR  user_email = '".$email."'
            OR  user_std_id = '".$student_no."'"
        );
    }
    else{
      $query = $this->db->query(
        " SELECT user_id
          FROM M_USER
          WHERE user_name = '".$username."'
            OR  user_email = '".$email."'"
        );
    }
    if($query->num_rows() == 0){

      $this->db->query(
        " INSERT INTO M_USER(user_name, user_password, user_std_id, user_email,
          user_first_name, user_last_name, user_gender, user_role, user_status)
          VALUES ('".$data['user_name'].
                  "','".$data['user_password'].
                  "',".(($data['user_role'] == 'S')? "'".$data['user_std_id']."'":"NULL").
                  ",'".$data['user_email'].
                  "','".$data['user_first_name'].
                  "','".$data['user_last_name'].
                  "','".$data['user_gender'].
                  "','".$data['user_role'].
                  "','".$data['user_status'].
                  "') "
      );
      if($this->db->affected_rows() > 0){
        return true;
      }
      else{
        return false;
      }
    }
    else {
      return false;
    }
  }

  public function get_user($username){
    $query = $this->db->query(
      " SELECT *
        FROM M_USER
        WHERE user_name = '".$username."'"
    );
    if($query->num_rows() == 1){
      return $query->result_array()[0];
    }
    else{
      return false;
    }
  }

  //TODO: adds a function to get all user list

  //TODO: adds a function to update user

  //TODO: adds a function to delete users

  public function login_user($username, $password){
    $query = $this->db->query(
      " SELECT user_id
        FROM M_USER
        WHERE user_name     = '".$username."'
          AND user_password = '".$password."'
          AND user_status   = 'A'"
    );
    if($query->num_rows() > 0){
      $this->db->query(
        " UPDATE M_USER ".
        " SET   user_last_login = '".date('Y-m-d H:i:s', time())."'".
        " WHERE user_name       = '".$username."'".
        "   AND user_password   = '".$password."'"
        );
      return true;
    }
    else {
      return false;
    }
  }

}
