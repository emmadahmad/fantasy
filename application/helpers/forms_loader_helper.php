<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$CI = & get_instance();
function select_countries($countries)
{
  $array = array();
  foreach($countries as $cont)
  {
    $array[$cont['country_id']] = $cont['country_name'];
  }
  return $array;
}

function select_user_types($user_types)
{
  $array = array();
  foreach($user_types as $cont)
  {
    $array[$cont['id']] = $cont['type_name'];
  }
  return $array;
}

function select_venues($venues)
{
  $array = array();
  foreach($venues as $cont)
  {
    $array[$cont['venue_id']] = $cont['venue_name'];
  }
  return $array;
}

function select_player_type($player_type)
{
  $array = array();
  foreach($player_type as $cont)
  {
    $array[$cont['type_id']] = $cont['type_name'];
  }
  return $array;
}

function select_dismissal_types($dismissal_type)
{
  $array = array();
  foreach($dismissal_type as $cont)
  {
    $array[$cont['dismissal_id']] = $cont['dismissal_name'];
  }
  return $array;
}

function select_dismissals($dismissal_type)
{
  $array = array();
  foreach($dismissal_type as $cont)
  {
    $array[$cont['dismissal_id']] = $cont['dismissal_abbr'];
  }
  return $array;
}

function select_players($players)
{
  $array = array();
  foreach($players as $cont)
  {
    $array[$cont['player_id']] = $cont['player_name'];
  }
  return $array;
}

function players_stats($players)
{
  $array = array();
  foreach($players as $cont)
  {
    $array[$cont['player_id']] = $cont;
  }
  return $array;
}

function simplify_team_array($team)
{
  $array = array();
  foreach ($team as $cont)
  {
    array_push($array, $cont->player_id);
  }
  return $array;
}