<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form_requests extends CI_Controller 
{

	public function __construct() 
	{
        parent::__construct();

        $this->load->model ( 'pages_model', 'pages' );
        $this->load->model ( 'countries_model', 'countries' );
        $this->load->model ( 'players_model', 'players' );
        $this->load->model ( 'player_match_info_model', 'player_match' );
        $this->load->model ( 'player_match_stats_model', 'player_stats' );
        $this->load->model ( 'matches_model', 'matches' );
        $this->load->model ( 'generic_model', 'general' );
        $this->load->model ( 'users_model', 'users' );

        $this->load->helper('form');
        $this->load->helper('forms_loader');
        $this->load->helper('formulas');
    }

	public function index()
	{		
		$data['content'] = "HELLO";
		$this->template->title('Admin', 'Dashboard');

		$this->template->set_layout('header_footer', 'backend')->
		build('dashboard.php', $data);
	}

	public function login()
	{
		if(!empty($_POST))
		{
			$email = post('email');
			$password = post('password');
			if($this->users->user_exists($email) == USER_VALID)
			{
				$res = $this->users->admin_login($email,$password);
				if($res == USER_INVALID)
				{
					$alert_data = array(
	            		'alert'  => TRUE,
						'alert_type'     => "danger",
						'alert_message' => "Wrong username or password. Please try again."
					);
				}
				else
				{
					$userSessionArray = array(
						'is_admin_login' => TRUE,
						'admin_id' => $res[0]->user_id,
						'admin_name' => $res[0]->user_name,
						'admin_email'=>$res[0]->email
					);
					set_session($userSessionArray);
					redirect(base_url()."admin");
				}
			}
			else if($this->users->user_exists($email) == USER_NA)
			{
				$alert_data = array(
            		'alert'  => TRUE,
					'alert_type'     => "danger",
					'alert_message' => "User does not exist."
				);
			}
		}
		else
		{
			$alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "warning",
				'alert_message' => "Fields cannot be empty"
			);
		}
		$this->session->set_userdata($alert_data);
		redirect(base_url()."admin/login");
	}

	public function addPlayerInfo()
	{
		if(!empty($_POST))
		{
			if($this->general->get_all_by_key('players', 'player_name', post('player_name')))
			{
				$alert_data = array(
            		'alert'  => TRUE,
					'alert_type'     => "warning",
					'alert_message' => "The player already exists. Please try again with a new name."
				);
			}
			else
			{
				$db_data = array(
		            'player_name' => post('player_name'),
		            'player_type' => post('player_type'),
		            'player_country' => post('country')
		        );
		        $new_res = $this->general->insert_into('players',$db_data);
		        if($new_res)
		        {
		        	$upload = file_uploader($_FILES['player_photo'],$new_res,'players');
		        	if($upload)
		        	{
		        		$pic_db = array(
			        		'player_photo' => $upload
		        		);
		        		$picture = $this->general->update_by_key('players','player_id',$new_res,$pic_db);
		        	}

		        	
	        		$db_price = array(
		        		'player_id' => $new_res,
		        		'price' => post('price')
	        		);
		        	$db_stats = array(
		        		'player_id' => $new_res
	        		);
	        		$db_player_stats = array(
		        		'player_id' => $new_res,
		        		'matches' => post('matches')
	        		);
		        	$temp = $this->general->insert_into('batting_stats',$db_stats);
		        	$temp = $this->general->insert_into('bowling_stats',$db_stats);
		        	$temp = $this->general->insert_into('player_stats',$db_player_stats);
		        	$temp = $this->general->insert_into('player_match_stats',$db_price);
		        	$alert_data = array(
						'alert'  => TRUE,
						'alert_type'     => "success",
						'alert_message' => "The player has been added successfully."
					);
		        }
		        else
	        	{
		        	$alert_data = array(
						'alert'  => TRUE,
						'alert_type'     => "warning",
						'alert_message' => "Problem adding the player. Please try again."
					);
		        }			        
			}				
		}
		else
		{
			$alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "warning",
				'alert_message' => "The fields cannot be empty."
			);
		}
		$this->session->set_userdata($alert_data);
		redirect(base_url()."admin/players");
	}
	public function updatePlayerInfo()
	{
		$data_info = array();
		if(!empty($_POST))
		{
			$player_id = post('player_id');

			$db_data = array(
	            'player_name' => post('player_name'),
	            'player_type' => post('player_type'),
	            'player_country' => post('country')
	        );
	        $db_player_stats = array(
        		'matches' => post('matches')
    		);
	        $res = $this->general->update_by_key('players','player_id',$player_id,$db_data);
	        if($res)
	        {
	        	$temp = $this->general->update_by_key('player_stats','player_id',$player_id,$db_player_stats);
	        	$alert_data = array(
					'alert'  => TRUE,
					'alert_type'     => "success",
					'alert_message' => "Player info has been updated successfully.",
					'panel' => 'info'
				);
	        }
	        else
        	{
	        	$alert_data = array(
					'alert'  => TRUE,
					'alert_type'     => "warning",
					'alert_message' => "Problem updating the info. Please try again."
				);
	        }				
		}
		else
		{
			$alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "warning",
				'alert_message' => "The fields cannot be empty."
			);
		}
		$this->session->set_userdata($alert_data);
		redirect(base_url()."admin/players/edit_player/".$player_id);
	}

	public function updateBattingInfo()
	{
		if(!empty($_POST))
		{
			$player_id = post('player_id');

			$db_data = array(
	            'innings' => post('bat_innings'),
	            'not_outs' => post('not_outs'),
	            'balls_faced' => post('balls_faced'),
	            'runs' => post('bat_runs')
	        );
	        $batting_avg = get_bat_avg($db_data);
	        $batting_sr = get_bat_sr($db_data);

	        $player_stats = array(
	        	'batting_avg' => $batting_avg,
	        	'batting_sr' => $batting_sr
        	);

	        $res = $this->general->update_by_key('batting_stats','player_id',$player_id,$db_data);
	        if($res)
	        {
	        	$temp = $res = $this->general->update_by_key('player_stats','player_id',$player_id,$player_stats);
	        	$alert_data = array(
					'alert'  => TRUE,
					'alert_type'     => "success",
					'alert_message' => "Player Batting info has been updated successfully.",
					'panel' => 'bat'
				);
	        }
	        else
        	{
	        	$alert_data = array(
					'alert'  => TRUE,
					'alert_type'     => "warning",
					'alert_message' => "Problem updating the info. Please try again."
				);
	        }				
		}
		else
		{
			$alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "warning",
				'alert_message' => "The fields cannot be empty."
			);
		}
		$this->session->set_userdata($alert_data);
		redirect(base_url()."admin/players/edit_player/".$player_id);
	}

	public function updateBowlingInfo()
	{
		if(!empty($_POST))
		{
			$player_id = post('player_id');

			$db_data = array(
	            'innings' => post('bowl_innings'),
	            'balls' => post('balls'),
	            'wickets' => post('wickets'),
	            'runs' => post('bowl_runs')
	        );
	        $bowling_avg = get_bowl_avg($db_data);
	        $bowling_sr = get_bowl_sr($db_data);
	        $bowling_econ = get_bowl_econ($db_data);

	        $player_stats = array(
	        	'bowling_avg' => $bowling_avg,
	        	'bowling_sr' => $bowling_sr,
	        	'bowling_econ' => $bowling_econ
        	);

	        $res = $this->general->update_by_key('bowling_stats','player_id',$player_id,$db_data);
	        if($res)
	        {
	        	$temp = $res = $this->general->update_by_key('player_stats','player_id',$player_id,$player_stats);
	        	$alert_data = array(
					'alert'  => TRUE,
					'alert_type'     => "success",
					'alert_message' => "Player Bowling info has been updated successfully.",
					'panel' => 'bowl'
				);
	        }
	        else
        	{
	        	$alert_data = array(
					'alert'  => TRUE,
					'alert_type'     => "warning",
					'alert_message' => "Problem updating the info. Please try again."
				);
	        }				
		}
		else
		{
			$alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "warning",
				'alert_message' => "The fields cannot be empty."
			);
		}
		$this->session->set_userdata($alert_data);
		redirect(base_url()."admin/players/edit_player/".$player_id);
	}

	/*
	*
	USERS
	*
	*/

		public function addUser()
	{
		if(!empty($_POST))
		{
			if($this->general->get_all_by_key('users', 'email', post('email')))
			{
				$alert_data = array(
            		'alert'  => TRUE,
					'alert_type'     => "warning",
					'alert_message' => "User already exists. Please try again."
				);
			}
			else
			{
				$db_data = array(
		            'user_name' => post('user_name'),
		            'user_type' => post('user_type'),
		            'email' => post('email'),
		            'password' => post('password'),
		            'country' => post('country'),
		            'gender' => post('gender')
		        );
		        $new_res = $this->general->insert_into('users',$db_data);
		        $alert_data = array(
					'alert'  => TRUE,
					'alert_type'     => "success",
					'alert_message' => "Your user has been added successfully."
				);
			}				
		}
		else
		{
			$alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "warning",
				'alert_message' => "The fields cannot be empty."
			);
		}
		$this->session->set_userdata($alert_data);
		redirect(base_url()."admin/users");
	}

	public function updateUser($user_id)
	{
		if(!empty($_POST))
		{
			if($this->general->if_exists('users', 'user_id', post('user_id'), 'email', post('email')))
			{
				$alert_data = array(
					'alert'  => TRUE,
					'alert_type'     => "warning",
					'alert_message' => "The user already exists. Please try again."
				);
			}
			else
			{
		        $db_data = array(
		            'user_name' => post('user_name'),
		            'user_type' => post('user_type'),
		            'email' => post('email'),
		            'country' => post('country'),
		            'gender' => post('gender')
		        );
		        $new_res = $this->general->update_by_key('users','user_id',$user_id,$db_data);
		        if($new_res)
		        {
		        	$alert_data = array(
						'alert'  => TRUE,
						'alert_type'     => "success",
						'alert_message' => "The user has been successfully updated."
					);
		        }
		        else
		        {
		        	$alert_data = array(
						'alert'  => TRUE,
						'alert_type'     => "warning",
						'alert_message' => "We encoutered a problem updating the user. Please try again."
					);
		        }
			}				
		}
		else
		{
			$alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "warning",
				'alert_message' => "The fields cannot be empty. Please try again."
			);
		}
		$this->session->set_userdata($alert_data);
		redirect(base_url()."admin/users");
	}

	/*
	*
	COUNTRIES
	*
	*/

		public function addCountry()
	{
		if(!empty($_POST))
		{
			if($this->general->get_all_by_key('countries', 'country_name', post('country_name')))
			{
				$alert_data = array(
            		'alert'  => TRUE,
					'alert_type'     => "warning",
					'alert_message' => "Country already exists. Please try again."
				);
			}
			else
			{
				$upload = file_uploader($_FILES['country_flag'],post('country_name'),'flags');
				$db_data = array(
		            'country_name' => post('country_name'),
		            'country_flag' => $upload
		        );
		        $new_res = $this->general->insert_into('countries',$db_data);
		        $alert_data = array(
					'alert'  => TRUE,
					'alert_type'     => "success",
					'alert_message' => "Your country has been added successfully."
				);
			}				
		}
		else
		{
			$alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "warning",
				'alert_message' => "The fields cannot be empty."
			);
		}
		$this->session->set_userdata($alert_data);
		redirect(base_url()."admin/countries");
	}

	public function updateCountry($country_id)
	{
		if(!empty($_POST))
		{
			if($this->general->if_exists('countries', 'country_id', post('country_id'), 'country_name', post('country_name')))
			{
				$alert_data = array(
					'alert'  => TRUE,
					'alert_type'     => "warning",
					'alert_message' => "The page already exists. Please try again with a new name."
				);
			}
			else
			{
				$db_data = array(
		            'country_name' => post('country_name'),
		            'country_flag' => post('country_flag')
		        );
		        $new_res = $this->general->update_by_key('countries','country_id',$country_id,$db_data);
		        if($new_res)
		        {
		        	$alert_data = array(
						'alert'  => TRUE,
						'alert_type'     => "success",
						'alert_message' => "The page has been successfully updated."
					);
		        }
		        else
		        {
		        	$alert_data = array(
						'alert'  => TRUE,
						'alert_type'     => "warning",
						'alert_message' => "We encoutered a problem updating the page. Please try again."
					);
		        }
			}				
		}
		else
		{
			$alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "warning",
				'alert_message' => "The fields cannot be empty. Please try again."
			);
		}
		$this->session->set_userdata($alert_data);
		redirect(base_url()."admin/countries");
	}

	/*
	*
	PAGES
	*
	*/

		public function addPage()
	{
		if(!empty($_POST))
		{
			if($this->general->get_all_by_key('pages', 'page_name', post('page_slug')))
			{
				$alert_data = array(
            		'alert'  => TRUE,
					'alert_type'     => "warning",
					'alert_message' => "The page already exists. Please try again with a new name."
				);
			}
			else
			{
				$db_data = array(
		            'page_name' => post('page_slug'),
		            'display_name' => post('page_name'),
		            'page_content' => post('page_content')
		        );
		        $new_res = $this->general->insert_into('pages',$db_data);
		        $alert_data = array(
					'alert'  => TRUE,
					'alert_type'     => "success",
					'alert_message' => "The page has been added successfully."
				);
			}				
		}
		else
		{
			$alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "warning",
				'alert_message' => "The fields cannot be empty."
			);
		}
		$this->session->set_userdata($alert_data);
		redirect(base_url()."admin/pages");
	}
	
	public function updatePage($page_name)
	{
		if(!empty($_POST))
		{
			if($this->pages->get_page_by_name_not_id(post('page_id'),post('page_slug')))
			{
				$alert_data = array(
					'alert'  => TRUE,
					'alert_type'     => "warning",
					'alert_message' => "The page already exists. Please try again with a new name."
				);
			}
			else
			{
				$db_data = array(
		            'page_name' => post('page_slug'),
		            'display_name' => post('page_name'),
		            'page_content' => post('page_content')
		        );
		        $new_res = $this->general->update_by_key('pages','page_name',$page_name,$db_data);
		        if($new_res)
		        {
		        	$alert_data = array(
						'alert'  => TRUE,
						'alert_type'     => "success",
						'alert_message' => "The page has been successfully updated."
					);
		        }
		        else
		        {
		        	$alert_data = array(
						'alert'  => TRUE,
						'alert_type'     => "warning",
						'alert_message' => "We encoutered a problem updating the page. Please try again."
					);
		        }
			}				
		}
		else
		{
			$alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "warning",
				'alert_message' => "The fields cannot be empty. Please try again."
			);
		}
		$this->session->set_userdata($alert_data);
		redirect(base_url()."admin/pages");
	}

	/*
	*
	VENUES
	*
	*/

		public function addVenue()
	{
		if(!empty($_POST))
		{
			if($this->general->get_all_by_key('venues', 'venue_name', post('venue_name')))
			{
				$alert_data = array(
            		'alert'  => TRUE,
					'alert_type'     => "warning",
					'alert_message' => "Venue name already exists. Please try again."
				);
			}
			else
			{
				$db_data = array(
		            'venue_name' => post('venue_name'),
		            'venue_city' => post('venue_city'),
		            'venue_capacity' => post('venue_capacity'),
		            'venue_description' => post('venue_description'),
		            'venue_photo' => post('venue_photo'),
		        );
		        $new_res = $this->general->insert_into('venues',$db_data);
		        $alert_data = array(
					'alert'  => TRUE,
					'alert_type'     => "success",
					'alert_message' => "Your venue has been added successfully."
				);
			}				
		}
		else
		{
			$alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "warning",
				'alert_message' => "The fields cannot be empty."
			);
		}
		$this->session->set_userdata($alert_data);
		redirect(base_url()."admin/venues");
	}

	public function updateVenue($venue_id)
	{
		if(!empty($_POST))
		{
			if($this->general->if_exists('venues', 'venue_id', post('venue_id'), 'venue_name', post('venue_name')))
			{
				$alert_data = array(
					'alert'  => TRUE,
					'alert_type'     => "warning",
					'alert_message' => "The page already exists. Please try again with a new name."
				);
			}
			else
			{
				$db_data = array(
		            'venue_name' => post('venue_name'),
		            'venue_city' => post('venue_city'),
		            'venue_capacity' => post('venue_capacity'),
		            'venue_description' => post('venue_description'),
		            'venue_photo' => post('venue_photo'),
		        );
		        $new_res = $this->general->update_by_key('venues','venue_id',$venue_id,$db_data);
		        if($new_res)
		        {
		        	$alert_data = array(
						'alert'  => TRUE,
						'alert_type'     => "success",
						'alert_message' => "The venue has been successfully updated."
					);
		        }
		        else
		        {
		        	$alert_data = array(
						'alert'  => TRUE,
						'alert_type'     => "warning",
						'alert_message' => "We encoutered a problem updating the venue. Please try again."
					);
		        }
			}				
		}
		else
		{
			$alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "warning",
				'alert_message' => "The fields cannot be empty. Please try again."
			);
		}
		$this->session->set_userdata($alert_data);
		redirect(base_url()."admin/venues");
	}

	/*
	*
	MATCHES
	*
	*/

	public function addMatch()
	{
		if(!empty($_POST))
		{		
			$match_date = post('match_date');
			$match_date = format_date($match_date, DB_DATE);
			$match_time = post('match_time');
			$match_time = format_date($match_time, DB_TIME);
			$date = $match_date . " " . $match_time;
			$db_data = array(
	            'home_team' => post('home_team'),
	            'away_team' => post('away_team'),
	            'match_venue' => post('match_venue'),
	            'match_date' => $date
	        );
	        $match_id = $this->general->insert_into('matches',$db_data);
	        $db_match_data = array(
	            'match_id' => $match_id
	        );
	        $new_res = $this->general->insert_into('match_info',$db_match_data);
	        $alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "success",
				'alert_message' => "Your match has been added successfully."
			);			
		}
		else
		{
			$alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "warning",
				'alert_message' => "The fields cannot be empty."
			);
		}
		$this->session->set_userdata($alert_data);
		redirect(base_url()."admin/matches");
	}

	public function updateMatch()
	{
		if(!empty($_POST))
		{
			$match_id = post('match_id');
			$match_date = post('match_date');
			$match_date = format_date($match_date, DB_DATE);
			$match_time = post('match_time');
			$match_time = format_date($match_time, DB_TIME);
			$date = $match_date . " " . $match_time;
			$db_data = array(
	            'home_team' => post('home_team'),
	            'away_team' => post('away_team'),
	            'match_venue' => post('match_venue'),
	            'match_date' => $date
	        );
	        $new_res = $this->general->update_by_key('matches','match_id',$match_id,$db_data);
	        if($new_res)
	        {
	        	$alert_data = array(
					'alert'  => TRUE,
					'alert_type'     => "success",
					'alert_message' => "The match has been successfully updated."
				);
	        }
	        else
	        {
	        	$alert_data = array(
					'alert'  => TRUE,
					'alert_type'     => "warning",
					'alert_message' => "We encoutered a problem updating the match. Please try again."
				);
	        }			
		}
		else
		{
			$alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "warning",
				'alert_message' => "The fields cannot be empty. Please try again."
			);
		}
		$this->session->set_userdata($alert_data);
		redirect(base_url()."admin/matches");
	}

	public function addMatchDetails()
	{
		if(!empty($_POST))
		{
			$match_id = post('match_id');
			$db_data = array(
	            'completed' => 1,
	            'toss_won' => post('toss_won'),
	            'batting_first' => post('batting_first'),
	            'winner' => post('winner'),
	            'winner_runs' => post('winner_runs'),
	            'winner_wickets' => post('winner_wickets'),
	            'winner_extras' => post('winner_extras'),
	            'loser_runs' => post('loser_runs'),
	            'loser_wickets' => post('loser_wickets'),
	            'loser_extras' => post('loser_extras'),
	            'man_of_the_match' => post('man_of_the_match')
	        );

	        $res = $this->general->update_by_key('match_info', 'match_id', $match_id, $db_data);
	        $alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "success",
				'alert_message' => "Match data has been updated successfully.",
				'panel' => 'info'
			);			
		}
		else
		{
			$alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "warning",
				'alert_message' => "The fields cannot be empty."
			);
		}
		$this->session->set_userdata($alert_data);
		redirect(base_url()."admin/matches/add_match_details/" . $match_id);
	}

	public function addWinnerDetails()
	{
		if(!empty($_POST))
		{
			$match_id = post('match_id');
			$match_info = $this->general->get_all_by_key('match_info', 'match_id', $match_id);	
			$match = $this->matches->get_by_id($match_id);
			$winning_team = $this->general->get_all_by_key('countries', 'country_id', $match_info[0]->winner);
			$loser_team_id = ($match_info[0]->winner != $match[0]->home_team) ? $match[0]->home_team : $match[0]->away_team;
			$winning_team_players = $this->general->get_all_by_key('players', 'player_country', $winning_team[0]->country_id);
			$winning_team_players = select_players(object_to_array($winning_team_players));

			foreach($winning_team_players as $id => $name)
			{
				$batted = (post('batted-check-'.$id)) ? 1 : 0;
				$bowled = (post('bowled-check-'.$id)) ? 1 : 0;
				$batting_position = (post('batting_position-'.$id)) ? post('batting_position-'.$id) : 15;
				$bat_runs = (post('bat_runs-'.$id)) ? post('bat_runs-'.$id) : 0;
				$balls_faced = (post('balls_faced-'.$id)) ? post('balls_faced-'.$id) : 0;
				$bowl_runs = (post('bowl_runs-'.$id)) ? post('bowl_runs-'.$id) : 0;
				$overs = (post('overs-'.$id)) ? post('overs-'.$id) : 0;
				$wickets = $this->general->get_some_by_key('player_match_info', 'wickets', 'player_id', $id);

				$dismissal_type = (post('dismissal_type-'.$id)) ? post('dismissal_type-'.$id) : 0;
				$country_id = (post('country_id')) ? post('country_id') : 0;
				if($dismissal_type != NOT_OUT)
					$dismissed_player1 = (post('dismissed_player1-'.$id)) ? post('dismissed_player1-'.$id) : 0;
				else 
					$dismissed_player1 = 0;
				if($dismissal_type == CAUGHT)
					$dismissed_player2 = (post('dismissed_player2-'.$id)) ? post('dismissed_player2-'.$id) : 0;
				else 
					$dismissed_player2 = 0;

				$over_balls = floor($overs)*6;
				$balls_decimal = ($overs - floor($overs))*10;
				$over_balls +=  $balls_decimal;

				$batting_sr = calc_bat_sr($bat_runs, $balls_faced);
				$bowling_econ = calc_bowl_econ($bowl_runs, $overs);
				if(!is_null($wickets))
				{
					$wickets = $wickets[0]->wickets;
					$bowling_sr = calc_bowl_sr($over_balls, $wickets);
				}
				else
				{
					$bowling_sr = 0;
				}

				/* add player basic info */

				$player_info = array(
					'match_id' => $match_id,
					'player_id' => $id,
					'country_id' => $country_id
				);

				if (!$this->player_match->player_info_exists($match_id, $id))
		        {
		        	$res = $this->general->insert_into('player_match_info',$player_info);
		        }

				$db_data = array(
					'match_id' => $match_id,
					'player_id' => $id,
					'country_id' => $country_id,
		            'batted' => $batted,
		            'bowled' => $bowled,
		            'batting_position' => $batting_position,
		            'bat_runs' => $bat_runs,
		            'balls_faced' => $balls_faced,
		            'bowl_runs' => $bowl_runs,
		            'overs' => $overs,
		            'dismissal_type' => $dismissal_type,
		            'dismissed_player1' => $dismissed_player1,
		            'dismissed_player2' => $dismissed_player2,
		            'batting_sr' => $batting_sr,
		            'bowling_sr' => $bowling_sr,
		            'bowling_econ' => $bowling_econ
		        );
		        $points = calculate_points($db_data);
		        $db_data['points'] = $points;

		        /* Adding/updating match stats in player_match_info */
		        $keys = array('match_id' => $match_id, 'player_id' => $id);
	        	$res = $this->general->update_by_keys('player_match_info', $keys, $db_data);

		        /* Adding/updating player fantasy stats in player_match_stats */
		        $stats_data = calculate_stats($id);
		        $keys = array('player_id' => $id);
	        	$res = $this->general->update_by_keys('player_match_stats', $keys, $stats_data);

	        	/* Updating wickets/catches/stumps/runouts */
	        	if($dismissal_type != NOT_OUT)
	        	{
	        		$res_dismiss = update_wickets($match_id, $dismissed_player1, $loser_team_id);
	        	}
		        if($dismissal_type == CAUGHT)
		        {
		        	$res_dismiss = update_catches($match_id, $dismissed_player2, $loser_team_id);
		        }
		        else if($dismissal_type == RUN_OUT)
		        {
		        	$res_dismiss = update_runouts($match_id, $dismissed_player1, $loser_team_id);
		        }
		        else if($dismissal_type == STUMPED)
		        {
		        	$res_dismiss = update_stumps($match_id, $dismissed_player1, $loser_team_id);
		        }		        
			}
	        $alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "success",
				'alert_message' => "Match data has been updated successfully.",
				'panel' => 'win'
			);			
		}
		else
		{
			$alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "warning",
				'alert_message' => "The fields cannot be empty."
			);
		}
		$this->session->set_userdata($alert_data);
		redirect(base_url()."admin/matches/add_match_details/" . $match_id);
	}

	public function addLoserDetails()
	{
		if(!empty($_POST))
		{
			$match_id = post('match_id');
			$match = $this->matches->get_by_id($match_id);
			$match_info = $this->general->get_all_by_key('match_info', 'match_id', $match_id);
			$winning_team = $this->general->get_all_by_key('countries', 'country_id', $match_info[0]->winner);
			$winning_team_id = $winning_team[0]->country_id;
			$losing_team = ($match_info[0]->winner != $match[0]->home_team) ? $match[0]->home : $match[0]->away;
			$loser_team_id = ($match_info[0]->winner != $match[0]->home_team) ? $match[0]->home_team : $match[0]->away_team;
			$losing_team_players = $this->general->get_all_by_key('players', 'player_country', $loser_team_id);
			$losing_team_players = select_players(object_to_array($losing_team_players));

			foreach($losing_team_players as $id => $name)
			{
				$batted = (post('batted-check-'.$id)) ? 1 : 0;
				$bowled = (post('bowled-check-'.$id)) ? 1 : 0;
				$batting_position = (post('batting_position-'.$id)) ? post('batting_position-'.$id) : 15;
				$bat_runs = (post('bat_runs-'.$id)) ? post('bat_runs-'.$id) : 0;
				$balls_faced = (post('balls_faced-'.$id)) ? post('balls_faced-'.$id) : 0;
				$bowl_runs = (post('bowl_runs-'.$id)) ? post('bowl_runs-'.$id) : 0;
				$overs = (post('overs-'.$id)) ? post('overs-'.$id) : 0;
				$wickets = $this->general->get_some_by_key('player_match_info', 'wickets', 'player_id', $id);

				$dismissal_type = (post('dismissal_type-'.$id)) ? post('dismissal_type-'.$id) : 0;
				if($dismissal_type != NOT_OUT)
					$dismissed_player1 = (post('dismissed_player1-'.$id)) ? post('dismissed_player1-'.$id) : 0;
				else 
					$dismissed_player1 = 0;
				if($dismissal_type == CAUGHT)
					$dismissed_player2 = (post('dismissed_player2-'.$id)) ? post('dismissed_player2-'.$id) : 0;
				else 
					$dismissed_player2 = 0;
				$country_id = (post('country_id')) ? post('country_id') : 0;

				$over_balls = floor($overs)*6;
				$balls_decimal = ($overs - floor($overs))*10;
				$over_balls +=  $balls_decimal;

				$batting_sr = calc_bat_sr($bat_runs, $balls_faced);
				$bowling_econ = calc_bowl_econ($bowl_runs, $overs);
				if(!is_null($wickets))
				{
					$wickets = $wickets[0]->wickets;
					$bowling_sr = calc_bowl_sr($over_balls, $wickets);
				}
				else
				{
					$bowling_sr = 0;
				}

				/* add player basic info */

				$player_info = array(
					'match_id' => $match_id,
					'player_id' => $id,
					'country_id' => $country_id
				);

				if (!$this->player_match->player_info_exists($match_id, $id))
		        {
		        	$res = $this->general->insert_into('player_match_info',$player_info);
		        }

				$db_data = array(
					'match_id' => $match_id,
					'player_id' => $id,
					'country_id' => $country_id,
		            'batted' => $batted,
		            'bowled' => $bowled,
		            'batting_position' => $batting_position,
		            'bat_runs' => $bat_runs,
		            'balls_faced' => $balls_faced,
		            'bowl_runs' => $bowl_runs,
		            'overs' => $overs,
		            'dismissal_type' => $dismissal_type,
		            'dismissed_player1' => $dismissed_player1,
		            'dismissed_player2' => $dismissed_player2,
		            'batting_sr' => $batting_sr,
		            'bowling_sr' => $bowling_sr,
		            'bowling_econ' => $bowling_econ
		        );
		        $points = calculate_points($db_data);
		        $db_data['points'] = $points;

				/* Adding/updating match stats in player_match_info */
		        $keys = array('match_id' => $match_id, 'player_id' => $id);
	        	$res = $this->general->update_by_keys('player_match_info', $keys, $db_data);

		        /* Adding/updating player fantasy stats in player_match_stats */
		        $stats_data = calculate_stats($id);
		        $keys = array('player_id' => $id);
	        	$res = $this->general->update_by_keys('player_match_stats', $keys, $stats_data);

		        /* Updating wickets/catches/stumps/runouts */
		        if($dismissal_type != NOT_OUT)
	        	{
	        		$res_dismiss = update_wickets($match_id, $dismissed_player1, $winning_team_id);
	        	}
		        if($dismissal_type == CAUGHT)
		        {
		        	$res_dismiss = update_catches($match_id, $dismissed_player2, $winning_team_id);
		        }
		        else if($dismissal_type == RUN_OUT)
		        {
		        	$res_dismiss = update_runouts($match_id, $dismissed_player1, $winning_team_id);
		        }
		        else if($dismissal_type == STUMPED)
		        {
		        	$res_dismiss = update_stumps($match_id, $dismissed_player1, $winning_team_id);
		        }
			}
	        $alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "success",
				'alert_message' => "Match data has been updated successfully.",
				'panel' => 'lose'
			);			
		}
		else
		{
			$alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "warning",
				'alert_message' => "The fields cannot be empty."
			);
		}
		$this->session->set_userdata($alert_data);
		redirect(base_url()."admin/matches/add_match_details/" . $match_id);
	}

	public function calculatePoints()
	{
		if(!empty($_POST))
		{
			$match_id = post('match_id');
			$players = $this->general->get_all_by_key('player_match_info', 'match_id', $match_id,'player_id ASC');
			update_points($players);
			$alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "success",
				'alert_message' => "Match data has been updated successfully.",
				'panel' => 'info'
			);
		}
		else
		{
			$alert_data = array(
				'alert'  => TRUE,
				'alert_type'     => "warning",
				'alert_message' => "The fields cannot be empty."
			);
		}
		$this->session->set_userdata($alert_data);
		redirect(base_url()."admin/matches/add_match_details/" . $match_id);
	}

	
}