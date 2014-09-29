<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Countries_model extends CI_Model 
{
  function __construct() 
  {
    parent::__construct();
  }

  function get_countries()
  {
  	$query = $this->db->get('countries');
  	if ($query->num_rows() > 0)
  	{
      return $query->result();
    }
    else
    {
      return FALSE;
    }
  }

  function get_country_by_id($id)
  {
    $this->db->where('country_id', $id);
    $query = $this->db->get('countries');
    if ($query->num_rows() > 0)
    {
      return $query->result();
    }
    else
    {
      return FALSE;
    }
  }

  function get_page_by_name_not_id($id,$page_name)
  {
    $this->db->where('page_id != ',$id);
    $this->db->where('page_name',$page_name);
    $query = $this->db->get('pages');
    if ($query->num_rows() > 0)
    {
      return $query->result();
    }
    else
    {
      return FALSE;
    }
  }

  function get_content($page_name)
  {
  	$this->db->select('page_content');
  	$this->db->where('page_name', $page_name);
  	$query = $this->db->get('pages');
  	if ($query->num_rows() > 0)
  	{
      return $query->result();
    }
    else
    {
      return FALSE;
    }
  }

  function add_page($page_name)
  {
    $this->db->select('page_content');
    $this->db->where('page_name', $page_name);
    $query = $this->db->get('pages');
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