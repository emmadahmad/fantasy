<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form_requests extends CI_Controller 
{

	public function __construct() 
	{
        parent::__construct();

        $this->load->model ( 'generic/pages_model', 'pages' );
        $this->load->model ( 'generic/countries_model', 'countries' );
        $this->load->model ( 'generic/players_model', 'players' );
        $this->load->model ( 'generic/generic_model', 'general' );

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
				$db_data = array(
		            'country_name' => post('country_name'),
		            'country_flag' => post('country_flag')
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
}