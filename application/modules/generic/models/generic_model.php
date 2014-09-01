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

  function get_some_by_key($table_name, $columns, $key, $value)
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

  function insert_into($table_name, $data)
  {
    $result = $this->db->insert($table_name, $data);
    if($result)
    {
      return $this->db->insert_id();
    }
    else 
    {
      return FALSE;
    }
  }

  function delete_by_key($table_name, $key, $value)
  {
    $this->db->where($key, $value);
    $result = $this->db->delete($table_name);
    if($result)
    {
      return TRUE;
    }
    else 
    {
      return FALSE;
    }
  }

  function update_by_key($table_name, $key, $value, $data)
  {
    $this->db->where($key, $value);
    $result = $this->db->update($table_name, $data);
    if($result)
    {
      return TRUE;
    }
    else 
    {
      return FALSE;
    }
  }

  function if_exists($table, $key1, $val1, $key2, $val2)
  {
    $this->db->where($key1.' !=', $val1);
    $this->db->where($key2, $val2);
    $query = $this->db->get($table);
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