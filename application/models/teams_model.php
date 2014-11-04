<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Teams_model extends CI_Model 
{
  function __construct() 
  {
    parent::__construct();
  }

  function get_teams()
  {
    $this->db->from('teams');
    $this->db->join('users' , 'users.user_id = teams.manager');
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
}
?>