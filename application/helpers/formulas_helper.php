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

function calculate_points($data)
{
	global $CI;
	$CI->load->model('generic_model' , 'general');
	$CI->load->model ( 'player_match_info_model', 'player_match' );

	$total_points = 0;
	$batting_points = 0;
	$bowling_points = 0;
	$bonus_wicket_hauls = 0;
	$bonus_sr = 0;
	$bonus_neg = 0;
	$bonus_half_centuries = 0;
	$bonus_motm = 0;
	$bonus_econ = 0;
    
    $player_type = $CI->general->get_some_by_key('players', 'player_type', 'player_id', $data['player_id']);
    $dismissed_players = $CI->player_match->get_player_type($data['match_id'] , $data['player_id']);
    $player_type = $player_type[0];
    
    if($data['bat_runs'] >= 20 || $data['balls_faced'] >= 15)
    {    	
    	if($data['batting_sr'] >= 0.00 && $data['batting_sr'] <= 90.00)
    	{
    		$bonus_sr = -10;
    	}
    	else if($data['batting_sr'] > 90.00 && $data['batting_sr'] <= 120.00)
    	{
    		$bonus_sr = 0;
    	}
    	else if($data['batting_sr'] > 120.00 && $data['batting_sr'] <= 150.00)
    	{
    		$bonus_sr = 5;
    	}
    	else if($data['batting_sr'] > 150.00 && $data['batting_sr'] <= 180.00)
    	{
    		$bonus_sr = 10;
    	}
    	else if($data['batting_sr'] > 180.00)
    	{
    		$bonus_sr = 15;
    	}
    }

    if($data['dismissal_type'] != NOT_OUT && $data['bat_runs'] == 0)
    {
    	if($player_type != BOWLER)
    	{
    		$bonus_neg = -20;
    	}
    	else
    	{
    		$bonus_neg = -10;
    	}    	
    }
    else if($data['dismissal_type'] != NOT_OUT)
    {
    	if($player_type != BOWLER)
    	{
    		$bonus_neg = -5;
    	}
    	else
    	{
    		$bonus_neg = 0;
    	}
    }

    if($data['wickets'] > 0)
    {
    	foreach ($dismissed_players as $cont) 
    	{
    		if($cont['player_type'] != BOWLER)
    		{
    			$bowling_points += 25;
    		}
    		else if($cont['player_type'] == BOWLER)
    		{
    			$bowling_points += 15;
    		}
    	}
    }

    if($data['wickets'] >= 3 && $data['wickets'] < 5)
    {
    	$bonus_wicket_hauls += 20;
    }
    else if($data['wickets'] >= 5)
    {
    	$bonus_wicket_hauls += 30;
    }

    if($data['overs'] >= 2)
    {
    	if($data['bowling_econ'] >= 0.00 && $data['bowling_econ'] <= 4.00)
    	{
    		$bonus_econ = 15;
    	}
    	else if($data['bowling_econ'] > 4.00 && $data['bowling_econ'] <= 5.50)
    	{
    		$bonus_econ = 10;
    	}
    	else if($data['bowling_econ'] > 5.50 && $data['bowling_econ'] <= 7.00)
    	{
    		$bonus_econ = 0;
    	}
    	else if($data['bowling_econ'] > 7.00 && $data['bowling_econ'] <= 9.00)
    	{
    		$bonus_econ = -10;
    	}
    	else if($data['bowling_econ'] > 9.00)
    	{
    		$bonus_econ = -15;
    	}
    }    
    $bonus_half_centuries = floor($data['bat_runs']/50)*20;
    $bonus_points = $bonus_wicket_hauls + $bonus_sr + $bonus_neg + $bonus_half_centuries + $bonus_motm + $bonus_econ;
    if ($bonus_points < 0)
    {
    	$bonus_points = 0;
    }
    $batting_points += $data['bat_runs'];
    $total_points = $batting_points + $bowling_points + $bonus_points;
    return $total_points;
}

function calc_bat_sr($runs, $balls_faced)
{
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

function calc_bowl_avg($runs, $wickets)
{
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

function calc_bowl_sr($balls, $wickets)
{
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

function calc_bowl_econ($runs, $overs)
{
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