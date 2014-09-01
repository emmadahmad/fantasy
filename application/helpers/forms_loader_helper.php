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

function select_player_type($player_type)
{
  $array = array();
  foreach($player_type as $cont)
  {
    $array[$cont['type_id']] = $cont['type_name'];
  }
  return $array;
}