<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$CI = & get_instance();
function get_bat_avg($data)
{
	$innings = $data['innings'];
	$not_outs = $data['not_outs'];
	$balls_faced = $data['balls_faced'];
	$runs = $data['runs'];

	$dismissals = $innings - $not_outs;
	$avg = $runs/$dismissals;
	if($avg)
	{
		return $avg;
	}
	else
	{
		return 0.00;
	}
}

function get_bat_sr($data)
{
	$innings = $data['innings'];
	$not_outs = $data['not_outs'];
	$balls_faced = $data['balls_faced'];
	$runs = $data['runs'];

	$sr = ($runs/$balls_faced)*100;
	if($sr)
	{
		return $sr;
	}
	else
	{
		return 0.00;
	}
}

function get_bowl_avg($data)
{
	$innings = $data['innings'];
	$balls = $data['balls'];
	$wickets = $data['wickets'];
	$runs = $data['runs'];

	$avg = $runs/$wickets;
	if($avg)
	{
		return $avg;
	}
	else
	{
		return 0.00;
	}
}

function get_bowl_sr($data)
{
	$innings = $data['innings'];
	$balls = $data['balls'];
	$wickets = $data['wickets'];
	$runs = $data['runs'];

	$sr = $balls/$wickets;
	if($sr)
	{
		return $sr;
	}
	else
	{
		return 0.00;
	}
}

function get_bowl_econ($data)
{
	$innings = $data['innings'];
	$balls = $data['balls'];
	$wickets = $data['wickets'];
	$runs = $data['runs'];
	$overs = $balls/6;

	$econ = $runs/$overs;
	if($econ)
	{
		return $econ;
	}
	else
	{
		return 0.00;
	}
}