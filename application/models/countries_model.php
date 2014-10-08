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

  function get_playing_countries($country_id1 , $country_id2)
  {
    $this->db->where('country_id', $country_id1);
    $this->db->or_where('country_id', $country_id2);
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
}
?>