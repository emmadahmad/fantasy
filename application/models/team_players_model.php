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
    $this->db->select('team_players.*, players.*, player_match_stats.price');
    $this->db->from('team_players');
    $this->db->join('players', 'players.player_id = team_players.player_id');
    $this->db->join('player_match_stats', 'player_match_stats.player_id = team_players.player_id');
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

  function get_player_types($player_ids)
  {
    $this->db->select("SUM(player_type=1) AS batsmen, SUM(player_type=2) AS bowlers, SUM(player_type=3) AS all_rounders, SUM(player_type=4) AS wicket_keepers");
    $this->db->from('players');
    $this->db->where_in('player_id', $player_ids);
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