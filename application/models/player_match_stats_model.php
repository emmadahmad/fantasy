<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Player_match_stats_model extends CI_Model 
{
  function __construct() 
  {
    parent::__construct();
  }

  function player_info_exists($player_id)
  {
    $this->db->where('player_id', $player_id);
    $query = $this->db->get('player_match_stats');
    if ($query->num_rows() > 0)
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
  }

  function team_value($player_ids)
  {
    $this->db->select("SUM(price) as price");
    $this->db->where_in('player_id', $player_ids);
    $query = $this->db->get('player_match_stats');
    if ($query->num_rows() > 0)
    {
      $row = $query->result();
      return $row[0]->price;
    }
    else
    {
      return FALSE;
    }
  }
}
?>