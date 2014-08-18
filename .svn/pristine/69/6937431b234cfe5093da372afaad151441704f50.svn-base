<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class users_model extends CI_Model 
{
  function __construct() 
  {
    parent::__construct();
  }

  function login($email, $password, $usertype) {
    $userName = $this->db->escape($userName);
    $password = $this->db->escape($password);
     $email = $this->db->escape($email);
    //AND user_type = $usertype
    $query = $this->db->query("SELECT user_id, user_name, first_name, last_name, user_type, status,profile_image,availble_credits,is_free_available FROM users WHERE email = $email AND password = $password ");
    $numRows = $query->num_rows();
    
    if ($query->num_rows() > 0) {
      $row = $query->row();
    }
    // wrong username or password
    if ($numRows == 0) {
      return USER_INVALID;
    } else if ($numRows > 0 && $row->status == USER_VALID) {
      //login successful
      //create user sessions
      $userSessionArray = array(
          'is_login' => TRUE,
          'user_id' => $row->user_id,
          'user_name' => $row->user_name,
          'first_name' => $row->first_name,
          'last_name' => $row->last_name,
          'name' => $row->first_name . ' ' . $row->last_name,
          'email'=>$row->email,
          'user_type' => $row->user_type,
          'profile_image' => $row->profile_image,
          'availble_credits' => $row->availble_credits,
          'is_free_available' => $row->is_free_available,
      );
      set_session($userSessionArray);
      return USER_VALID;
    } else {
      // user is block
      return USER_BLOCKED;
    }
  }

  function logout() {
    $userSessionArray = array(
        'is_login' => FALSE,
        'user_id' => NULL,
        'user_name' => NULL,
        'first_name' => NULL,
        'last_name' => NULL,
        'name' => NULL,
        'user_type' => NULL,
        'email'=>null,
        'profile_image' => null,
        'availble_credits' => null,
        'is_free_available'=>null
    );
    unset_session($userSessionArray);
    return TRUE;
  }

  function registerUser($data) {
    if (get_db_value('users', 'user_name', array('user_name' => $data['user_name'])) == FALSE) {
      $this->db->set($data);
      $this->db->insert('users');
      return RETURN_SUCCESS;
    } else {
      return RETURN_DUPLICATE;
    }
  }

?>