<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Player_match_info_model extends CI_Model 
{
  function __construct() 
  {
    parent::__construct();
  }

  function player_info_exists($match_id , $player_id)
  {
    $this->db->where('match_id', $match_id);
    $this->db->where('player_id', $player_id);
    $query = $this->db->get('player_match_info');
    if ($query->num_rows() > 0)
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
  }
}
?>