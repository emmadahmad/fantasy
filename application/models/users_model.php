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

  function get_all()
  {
    $this->db->from('users');
    $this->db->join('user_types', 'user_types.id = users.user_type');
    $query = $this->db->get();
    if ($query->num_rows() > 0)
    {
      return $query->result();
    }
    else
    {
      return FALSE;
    }
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

  function admin_login($email, $password)
  {
    $this->db->where('email', $email);
    $this->db->where('password', $password);
    $this->db->where('user_type', USER_ADMIN);
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