<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Generic_model extends CI_Model 
{
  function __construct() 
  {
    parent::__construct();
  }

  function get_all($table_name)
  {
    $query = $this->db->get($table_name);
    if ($query->num_rows() > 0)
    {
      return $query->result();
    }
    else
    {
      return FALSE;
    }
  }

  function get_all_by_key($table_name, $key, $value)
  {
    $this->db->where($key, $value);
    $query = $this->db->get($table_name);
    if ($query->num_rows() > 0)
    {
      return $query->result();
    }
    else
    {
      return FALSE;
    }
  } 

  function get_some_by_key($table_name, $key, $value, $columns)
  {
    $this->db->select($columns);
    $this->db->where($key, $value);
    $query = $this->db->get($table_name);
    if ($query->num_rows() > 0)
    {
      return $query->result();
    }
    else
    {
      return FALSE;
    }
  }
}
?>