<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Pages_model extends CI_Model 
{
  function __construct() 
  {
    parent::__construct();
  }

  function get_pages()
  {
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
}
?>