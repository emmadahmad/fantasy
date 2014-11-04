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

  function get_player_type($match_id , $player_id)
  {
    $this->db->select('players.player_id, players.player_type');
    $this->db->where('match_id', $match_id);
    $this->db->where('dismissed_player1', $player_id);
    $this->db->join('players', 'player_match_info.player_id = players.player_id', 'left');
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
  
  function get_catches($match_id, $player_id)
  {
    $this->db->select('COUNT(*)  AS catches');
    $this->db->where('dismissal_type', 3);
    $this->db->where('match_id', $match_id);
    $this->db->where('dismissed_player2', $player_id);
    $query = $this->db->get('player_match_info');
    if ($query->num_rows() > 0)
    {
      return $query->result();
    }
    else
    {
      return FALSE;
    }
  }

  function get_runouts($match_id, $player_id)
  {
    $this->db->select('COUNT(*)  AS runouts');
    $this->db->where('dismissal_type', 5);
    $this->db->where('match_id', $match_id);
    $this->db->where('dismissed_player1', $player_id);
    $query = $this->db->get('player_match_info');
    if ($query->num_rows() > 0)
    {
      return $query->result();
    }
    else
    {
      return FALSE;
    }
  }

  function get_stumps($match_id, $player_id)
  {
    $this->db->select('COUNT(*)  AS stumps');
    $this->db->where('dismissal_type', 4);
    $this->db->where('match_id', $match_id);
    $this->db->where('dismissed_player1', $player_id);
    $query = $this->db->get('player_match_info');
    if ($query->num_rows() > 0)
    {
      return $query->result();
    }
    else
    {
      return FALSE;
    }
  }

  function get_wickets($match_id, $player_id)
  {
    $this->db->select('COUNT(*)  AS wickets');
    $this->db->where('(dismissal_type=1 OR dismissal_type=2 OR dismissal_type=3 OR dismissal_type=4 OR dismissal_type=6)');
    $this->db->where('match_id', $match_id);
    $this->db->where('dismissed_player1', $player_id);
    $query = $this->db->get('player_match_info');
    if ($query->num_rows() > 0)
    {
      return $query->result();
    }
    else
    {
      return FALSE;
    }
  }

  function get_stats_data($player_id)
  {
    $query = $this->db->query('select count(*) as matches_played, sum(batted) as batted, (Select count(*) FROM player_match_info where player_id = '.$player_id.' and dismissal_type = 7) as not_outs,
    sum(bat_runs) as bat_runs, sum(balls_faced) as balls_faced, sum(bowled) as bowled, sum(bowl_runs) as bowl_runs, sum(wickets) as wickets, 
    round(sum((floor(overs)*6) + ((overs - floor(overs))*10)),0) as balls, sum(points) as points,
    sum(catches) as catches, sum(stumps) as stumps, sum(runouts) as runouts from player_match_info where player_id = '.$player_id);
    //$this->db->where('player_id', $player_id);
    //$query = $this->db->get();
    if ($query->num_rows() > 0)
    {
      $result = $query->result();
      $result = $result[0];
      return $result;
    }
    else
    {
      return FALSE;
    }
  }

  function get_dismissed_players($match_id, $player_id)
  {
    $this->db->where('match_id', $match_id);
    $this->db->where('dismissed_player1', $player_id);
    $this->db->where('dismissal_type !=', RUN_OUT);
    $this->db->join('players', 'player_match_info.player_id = players.player_id', 'left');
    $query = $this->db->get('player_match_info');
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