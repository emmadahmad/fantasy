<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Team_players_model extends CI_Model 
{
  function __construct() 
  {
    parent::__construct();
  }

  function get_user_players($user_id)
  {
    $this->db->from('team_players');
    $this->db->join('players', 'players.player_id = team_players.player_id');
    $this->db->where('user_id', $user_id);
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