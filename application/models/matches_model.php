<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Matches_model extends CI_Model 
{
  function __construct() 
  {
    parent::__construct();
  }

  function get_all_matches()
  {
    $this->db->select('matches.*, C1.country_name AS home, C2.country_name AS away, venues.venue_name');
    $this->db->from('matches');
    $this->db->join('countries AS C1', 'matches.home_team = C1.country_id', 'left');
    $this->db->join('countries AS C2', 'matches.away_team = C2.country_id', 'left');
    $this->db->join('venues', 'matches.match_venue = venues.venue_id', 'left');
    $this->db->order_by("match_date", "asc");
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

  function get_country_matches($country_id)
  {
    $this->db->select('matches.*, C1.country_name AS home, C2.country_name AS away, venues.venue_name');
    $this->db->from('matches');
    $this->db->join('countries AS C1', 'matches.home_team = C1.country_id', 'left');
    $this->db->join('countries AS C2', 'matches.away_team = C2.country_id', 'left');
    $this->db->join('venues', 'matches.match_venue = venues.venue_id', 'left');
    $this->db->order_by("match_date", "asc");
    $this->db->where('matches.home_team' , $country_id);
    $this->db->or_where('matches.away_team' , $country_id);
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

  function get_by_id($match_id)
  {
    $this->db->select('matches.*, C1.country_name AS home, C2.country_name AS away, venues.venue_name');
    $this->db->from('matches');
    $this->db->join('countries AS C1', 'matches.home_team = C1.country_id', 'left');
    $this->db->join('countries AS C2', 'matches.away_team = C2.country_id', 'left');
    $this->db->join('venues', 'matches.match_venue = venues.venue_id', 'left');
    $this->db->order_by("match_date", "asc");
    $this->db->where('matches.match_id' , $match_id);
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