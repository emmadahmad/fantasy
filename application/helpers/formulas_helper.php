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

function calc_bat_avg($runs, $dismissals)
{
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

function update_points($players)
{
	global $CI;
	$CI->load->model('generic_model' , 'general');

	$db_data=array();
	foreach ($players as $cont) 
	{
		$db_data = array(
			'match_id' => $cont->match_id,
			'player_id' => $cont->player_id,
			'country_id' => $cont->country_id,
	        'batted' => $cont->batted,
	        'bowled' => $cont->bowled,
	        'batting_position' => $cont->batting_position,
	        'bat_runs' => $cont->bat_runs,
	        'balls_faced' => $cont->balls_faced,
	        'bowl_runs' => $cont->bowl_runs,
	        'overs' => $cont->overs,
	        'dismissal_type' => $cont->dismissal_type,
	        'dismissed_player1' => $cont->dismissed_player1,
	        'dismissed_player2' => $cont->dismissed_player2
	    );

		$over_balls = floor($cont->overs)*6;
		$balls_decimal = ($cont->overs - floor($cont->overs))*10;
		$over_balls +=  $balls_decimal;

		$db_data['batting_sr'] = calc_bat_sr($cont->bat_runs, $cont->balls_faced);
		$db_data['bowling_sr'] = calc_bowl_sr($over_balls, $cont->wickets);
		$db_data['bowling_econ'] = calc_bowl_econ($cont->bowl_runs, $cont->overs);
    	$db_data['points'] = calculate_points($db_data);		

    	$keys = array('match_id' => $cont->match_id, 'player_id' => $cont->player_id);
    	$res = $CI->general->update_by_keys('player_match_info', $keys, $db_data);

    	$stats_data = calculate_stats($cont->player_id);
    	$stats_data['player_id'] = $cont->player_id;

    	$exist_keys = array('player_id' => $cont->player_id);
    	$player_exists = $CI->general->exists('player_match_stats', $exist_keys);

    	if($player_exists)
    	{
    		$keys = array('player_id' => $cont->player_id);
    		$res = $CI->general->update_by_keys('player_match_stats', $keys, $stats_data);
    	}
    	else
    	{
    		$res = $this->general->insert_into('player_match_stats',$stats_data);
    	}
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
	$fielding_points = 0;
	$bonus_wicket_hauls = 0;
	$bonus_sr = 0;
	$bonus_neg = 0;
	$bonus_half_centuries = 0;
	$bonus_motm = 0;
	$bonus_econ = 0;
	$catches_points = 0;
	$stumps_points = 0;
	$runouts_points = 0;
    
    $player_type = $CI->general->get_some_by_key('players', 'player_type', 'player_id', $data['player_id']);
    $dismissed_players = $CI->player_match->get_player_type($data['match_id'] , $data['player_id']);
    $player_type = $player_type[0];

    if($data['catches'])
    {
    	$catches_points = $data['catches']*10;
    }
    if($data['stumps'])
    {
    	$stumps_points = $data['stumps']*10;
    }
    if($data['runouts'])
    {
    	$runouts_points = $data['runouts']*10;
    }
    
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
    $fielding_points = $catches_points + $stumps_points + $runouts_points;
    $total_points = $batting_points + $bowling_points + $bonus_points + $fielding_points;
    return $total_points;
}

function calculate_stats($player_id)
{
	global $CI;
	$CI->load->model('generic_model' , 'general');
	$CI->load->model ( 'player_match_info_model', 'player_match' );
    
    $player_data = $CI->player_match->get_stats_data($player_id);

    $matches_played = $player_data->matches_played;
	$innings_batted = $player_data->batted;
	$innings_bowled = $player_data->bowled;
	$not_outs = $player_data->not_outs;
	$dismissals = $innings_batted - $not_outs;
	$bat_runs = $player_data->bat_runs;
	$balls_faced = $player_data->balls_faced;
	$bowl_runs = $player_data->bowl_runs;
	$wickets = $player_data->wickets;
	$balls = $player_data->balls;
	$overs = $balls/6;
	$points = $player_data->points;
	$catches = $player_data->catches;
	$stumps = $player_data->stumps;
	$runouts = $player_data->runouts;

	$batting_avg = calc_bat_avg($bat_runs, $dismissals);
	$batting_sr = calc_bat_sr($bat_runs, $balls_faced);
	$bowling_avg = calc_bowl_avg($bowl_runs, $wickets);
	$bowling_sr = calc_bowl_sr($bowl_runs, $wickets);
	$bowling_econ = calc_bowl_econ($bowl_runs, $overs);
	$catches_ratio = $catches/$matches_played;
	$runouts_ratio = $runouts/$matches_played;
	$stumps_ratio = $stumps/$matches_played;

	$player_stats = array();

	$player_stats['matches'] = $matches_played;
	$player_stats['innings_batted'] = $innings_batted;
	$player_stats['innings_bowled'] = $innings_bowled;
	$player_stats['not_outs'] = $not_outs;
	$player_stats['bat_runs'] = $bat_runs;
	$player_stats['balls_faced'] = $balls_faced;
	$player_stats['batting_avg'] = $batting_avg;
	$player_stats['batting_sr'] = $batting_sr;
	$player_stats['bowl_runs'] = $bowl_runs;
	$player_stats['wickets'] = $wickets;
	$player_stats['balls'] = $balls;
	$player_stats['bowling_avg'] = $bowling_avg;
	$player_stats['bowling_sr'] = $bowling_sr;
	$player_stats['bowling_econ'] = $bowling_econ;
	$player_stats['points'] = $points;
	$player_stats['catches_ratio'] = $catches_ratio;
	$player_stats['runouts_ratio'] = $runouts_ratio;
	$player_stats['stumps_ratio'] = $stumps_ratio;

    return $player_stats;
}

function 