<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$CI = & get_instance();
function authenticate()
{
	if(!get_session("is_login") && !get_session('user_id'))
	{
		 //redirect('/translation/frontend/projects/message', 'refresh');
	}
}
function set_session($session_array) 
{
  $CI = & get_instance();
  return $CI->session->set_userdata($session_array);
}

function get_session($key) 
{
  $CI = & get_instance();
  return $CI->session->userdata($key);
}

function unset_session($key) 
{
  $CI = & get_instance();
  return $CI->session->unset_userdata($key);
}

function get($key = NULL, $xss_clean = TRUE) 
{
  global $CI;
  if ($key === NULL) 
  {
    return FALSE;
  }
  return $CI->input->get($key, $xss_clean);
}

function post($key = NULL, $xss_clean = TRUE) 
{
  global $CI;
  if ($key === NULL) 
  {
    return FALSE;
  }
  return $CI->input->post($key, $xss_clean);
}

function _xss_clean($val, $bool) 
{
  global $CI;
  if (CI_VERSION < 2) 
  {
    return $bool ? $CI->input->xss_clean($val) : $val;
  } 
  else 
  {
    return $bool ? $CI->security->xss_clean($val) : $val;
  }
}

function link_for($link) 
{  
  return base_url() . $link;
}

function print_array($array) 
{
  echo '<pre>' . print_r($array, true) . '</pre>';
}

function array_to_object($d) 
{
  if (is_array($d)) 
  {
    /*
     * Return array converted to object
     * Using __FUNCTION__ (Magic constant)
     * for recursive call
     */
    return (object) array_map(__FUNCTION__, $d);
  } 
  else 
  {
    // Return object
    return $d;
  }
}

function object_to_array($d) 
{
  if (is_object($d)) 
  {
    // Gets the properties of the given object
    // with get_object_vars function
    $d = get_object_vars($d);
  }

  if (is_array($d)) 
  {
    /*
     * Return array converted to object
     * Using __FUNCTION__ (Magic constant)
     * for recursive call
     */
    return array_map(__FUNCTION__, $d);
  } 
  else 
  {
    // Return array
    return $d;
  }
}

function get_theme_path() 
{
  global $CI;
  $CI->load->library('template');
  $CI->template->get_theme_path();
  return $CI->template->get_theme_path();
}

function get_views_include_path() 
{
  return APPPATH.get_theme_path() . "views/";
}

function get_refferer() 
{
  return $_SERVER['HTTP_REFERER'];
}

function get_current_time_stamp() {
  //2009-11-16 16:08:11
  return date('Y-m-d G:i:s');
}

function get_date_difference_indays($first_date, $second_date)
{
	$difference = strtotime($first_date) - strtotime($second_date);
	$days = $difference / (60*60*24);
	return ((int)$days == $days)? $days : (int)$days+1;
}

function get_date_time($date_formate, $date_string)
{
	return date($date_formate,strtotime($date_string));
}

function encrypt_password($password) {
  return md5($password);
}

if (!function_exists('get_random_password')) 
{
  function get_random_password($chars_min = 6, $chars_max = 8, $use_upper_case = false, $include_numbers = false, $include_special_chars = false)
  {
    $length = rand($chars_min, $chars_max);
    $selection = 'aeuoyibcdfghjklmnpqrstvwxz';
    if ($include_numbers)
    {
      $selection .= "1234567890";
    }
    if ($include_special_chars) 
    {
      $selection .= "!@\"#$%&[]{}?|";
    }
    $password = "";
    for ($i = 0; $i < $length; $i++) 
    {
      $current_letter = $use_upper_case ? (rand(0, 1) ? strtoupper($selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))];
      $password .= $current_letter;
    }
    return $password;
  }
}

function is_valid_url($url) 
{
  return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
}

function create_random_code() 
{
  $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
  srand((double) microtime() * 1000000);
  $i = 0;
  $pass = '';
  while ($i <= 6) 
  {
    $num = rand() % 33;
    $tmp = substr($chars, $num, 1);
    $pass = $pass . $tmp;
    $i++;
  }
  return $pass;
}

function hasValue($value)
{
  return ($value != null && $value !='') ? true : false;
}

function time_elapsed_string($ptime)
{
    $etime = time() - $ptime;

    if ($etime < 1)
    {
        return '0 seconds';
    }

    $a = array( 12 * 30 * 24 * 60 * 60  =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ago';
        }
    }
}