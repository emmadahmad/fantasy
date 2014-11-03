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

  function user_exists($email)
  {
    $this->db->where('email', $email);
    $query = $this->db->get('users');
    if ($query->num_rows() > 0)
    {
      return USER_VALID;
    }
    else
    {
      return USER_NA;
    }
  }

  function login($email, $password)
  {
    $this->db->where('email', $email);
    $this->db->where('password', $password);
    $query = $this->db->get('users');

    if ($query->num_rows() > 0)
    {
      return $query->result();
    }
    else
    {
      return USER_INVALID;
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
}

?>