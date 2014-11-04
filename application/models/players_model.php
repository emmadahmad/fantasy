<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Players_model extends CI_Model 
{
  function __construct() 
  {
    parent::__construct();
  }

  function get_all_country_players()
  {
    $this->db->select('players.*, countries.country_name, type_name');
    $this->db->from('players');
    $this->db->join('countries', 'player_country = country_id');
    $this->db->join('player_types', 'player_type = type_id');
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

  function get_country_players($country_id)
  {
    $this->db->select('players.*, countries.country_name, type_name');
    $this->db->from('players');
    $this->db->join('countries', 'player_country = country_id');
    $this->db->join('player_types', 'player_type = type_id');
    $this->db->where('country_id', $country_id);
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

  function get_player($player_id)
  {
    $this->db->select('players.*, countries.country_name, type_name');
    $this->db->from('players');
    $this->db->join('countries', 'player_country = country_id');
    $this->db->join('player_types', 'player_type = type_id');
    $this->db->where('player_id', $player_id);
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

  function get_player_stats($player_id)
  {
    $this->db->from('players');
    $this->db->join('player_stats', 'players.player_id = player_stats.player_id');
    $this->db->where('players.player_id', $player_id);
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

  function get_batting_stats($player_id)
  {
    $this->db->from('players');
    $this->db->join('batting_stats', 'players.player_id = batting_stats.player_id');
    $this->db->where('players.player_id', $player_id);
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

  function get_bowling_stats($player_id)
  {
    $this->db->from('players');
    $this->db->join('bowling_stats', 'players.player_id = bowling_stats.player_id');
    $this->db->where('players.player_id', $player_id);
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

  function get_match_players($country1, $country2)
  {
    $this->db->from('players');
    $this->db->where('player_country', $country1);
    $this->db->or_where('player_country', $country2);
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

  function get_player_stats_by_type($player_type = BATSMEN)
  {
    $this->db->from('players');
    $this->db->join('player_match_stats', 'players.player_id = player_match_stats.player_id');
    $this->db->where('players.player_type', $player_type);
    $this->db->order_by('player_match_stats.price DESC');
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