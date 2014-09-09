<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller 
{

	public function __construct() 
	{
        parent::__construct();
        $logged_in = 1;

        $this->load->model ( 'generic/pages_model', 'pages' );
        $this->load->model ( 'generic/countries_model', 'countries' );
        $this->load->model ( 'generic/players_model', 'players' );
        $this->load->model ( 'generic/generic_model', 'general' );

        $this->load->helper('form');
        $this->load->helper('forms_loader');

        $this->template->set_partial('head', 'backend/partials/head');
        $this->template->set_partial('end_content', 'backend/partials/end_content_tags');
        $this->template->set_partial('footer', 'backend/partials/footer');

		if($logged_in)
		{
			$this->template->set_partial('header', 'backend/partials/header_logged_in');
			$this->template->set_partial('content', 'backend/partials/content_logged_in');
		}
		else
		{
			$this->template->set_partial('header', 'backend/partials/header_logged_out');
			$this->template->set_partial('content', 'backend/partials/content_logged_out');
		}
    }

	public function index()
	{		
		$data['content'] = "HELLO";
		$this->template->title('Admin', 'Dashboard');

		$this->template->set_layout('header_footer', 'backend')->
		build('dashboard.php', $data);
	}

	/*
	*
	* PAGES
	*
	*/

	public function pages($action=null,$page_name=null)
	{
		$pages = $this->general->get_all('pages');
		$data['pages'] = $pages;
		if($this->session->userdata('alert'))
		{
			$data['alert'] = $this->session->userdata('alert');
			$data['alert_type'] = $this->session->userdata('alert_type');
			$data['alert_message'] = $this->session->userdata('alert_message');
			$alert_data = array(
                   'alert'  => FALSE,
                   'alert_type'     => null,
                   'alert_message' => null
               	);
			$this->session->set_userdata($alert_data);
		}
		
		if($page_name != null)
		{
			$page = $this->general->get_all_by_key('pages','page_name',$page_name);
			$data_edit['page'] = $page[0];
		}
		
		if($action == null)
		{			
			$this->template->title('Admin', 'Manage Pages');
			$this->template->set_layout('header_footer', 'backend')->
			build('pages/pages.php', $data);
		}
		else if($action == 'add_page')
		{
			$this->template->title('Admin', 'Add New Page');
			$this->template->set_layout('header_footer', 'backend')->
			build('pages/add_page.php', $data);
		}
		else if($action == 'edit_page')
		{
			$this->template->title('Admin', 'Update Page');
			$this->template->set_layout('header_footer', 'backend')->
			build('pages/edit_page.php', $data_edit);
		}
		else if($action == 'delete_page')
		{
			if($this->general->delete_by_key('pages','page_name',$page_name))
			{
				$alert_data = array(
					'alert'  => TRUE,
					'alert_type'     => "success",
					'alert_message' => "The page has been successfully deleted."
				);
			}
			else 
			{
				$alert_data = array(
					'alert'  => TRUE,
					'alert_type'     => "warning",
					'alert_message' => "We encoutered a problem deleting the page. Please try again."
				);
			}
			$this->session->set_userdata($alert_data);
			redirect(base_url()."admin/pages");
		}			
	}

	/*
	*
	* COUNTRIES
	*
	*/

	public function countries($action=null,$country_id=null)
	{
		$countries = $this->general->get_all('countries');
		$data['countries'] = $countries;
		if($this->session->userdata('alert'))
		{
			$data['alert'] = $this->session->userdata('alert');
			$data['alert_type'] = $this->session->userdata('alert_type');
			$data['alert_message'] = $this->session->userdata('alert_message');
			$alert_data = array(
                   'alert'  => FALSE,
                   'alert_type'     => null,
                   'alert_message' => null
               	);
			$this->session->set_userdata($alert_data);
		}
		
		if($country_id != null)
		{
			$country = $this->general->get_all_by_key('countries','country_id',$country_id);
			$data_edit['country'] = $country[0];
		}
		
		if($action == null)
		{			
			$this->template->title('Admin', 'Manage Countries');
			$this->template->set_layout('header_footer', 'backend')->
			build('countries/countries.php', $data);
		}
		else if($action == 'add_country')
		{
			$this->template->title('Admin', 'Add New Country');
			$this->template->set_layout('header_footer', 'backend')->
			build('countries/add_country.php', $data);
		}
		else if($action == 'edit_country')
		{
			$this->template->title('Admin', 'Update Country');
			$this->template->set_layout('header_footer', 'backend')->
			build('countries/edit_country.php', $data_edit);
		}
		else if($action == 'delete_country')
		{
			if($this->general->delete_by_key('countries','country_id',$country_id))
			{
				$alert_data = array(
					'alert'  => TRUE,
					'alert_type'     => "success",
					'alert_message' => "Your country has been successfully deleted."
				);
			}
			else 
			{
				$alert_data = array(
					'alert'  => TRUE,
					'alert_type'     => "warning",
					'alert_message' => "We encoutered a problem deleting the country. Please try again."
				);
			}
			$this->session->set_userdata($alert_data);
			redirect(base_url()."admin/countries");
		}			
	}



	/*
	*
	* PLAYERS
	*
	*/

	public function players($action=null,$player_id=null)
	{
		$players = $this->players->get_all_country_players();
		$countries = $this->general->get_all('countries');
		$player_types = $this->general->get_all('player_types');
		if($this->session->userdata('alert'))
		{
			$data['alert'] = $this->session->userdata('alert');
			$data['alert_type'] = $this->session->userdata('alert_type');
			$data['alert_message'] = $this->session->userdata('alert_message');
			if($this->session->userdata('alert_message'))
			{
				$data['panel'] = $this->session->userdata('panel');
			}
			$alert_data = array(
                   'alert'  => FALSE,
                   'alert_type'     => null,
                   'alert_message' => null
               	);
			$this->session->set_userdata($alert_data);
		}
		
		if($player_id != null)
		{
			$player_info = $this->players->get_player($player_id);
			$player_stats = $this->players->get_player_stats($player_id);
			$batting_stats = $this->players->get_batting_stats($player_id);
			$bowling_stats = $this->players->get_bowling_stats($player_id);

			$player_info = $player_info[0];
			$player_stats = $player_stats[0];
			$batting_stats = $batting_stats[0];
			$bowling_stats = $bowling_stats[0];

			$data['player_info'] = $player_info;
			$data['player_stats'] = $player_stats;
			$data['batting_stats'] = $batting_stats;
			$data['bowling_stats'] = $bowling_stats;
		}
		
		if($action == null)
		{
			$data['players'] = $players;
			$data['countries'] = $countries;
			$this->template->title('Admin', 'Manage Players');
			$this->template->set_layout('header_footer', 'backend')->
				build('players/players.php', $data);
		}
		else if($action == 'view_player')
		{			
			$this->template->title('Admin', 'View Player Details');
			$this->template->set_layout('header_footer', 'backend')->
				build('players/view_player.php', $data);
		}
		else if($action == 'add_player')
		{
			$data['countries'] = select_countries(object_to_array($countries));
			$data['player_types'] = select_player_type(object_to_array($player_types));

			$this->template->title('Admin', 'Add New Player');
			$this->template->set_layout('header_footer', 'backend')->
				build('players/add_player.php', $data);
		}
		else if($action == 'edit_player')
		{
			$data['countries'] = select_countries(object_to_array($countries));
			$data['player_types'] = select_player_type(object_to_array($player_types));

			$this->template->title('Admin', 'Update Player');
			$this->template->set_layout('header_footer', 'backend')->
				build('players/edit_player.php', $data);
		}
		else if($action == 'delete_player')
		{
			if($this->general->delete_by_key('players','player_id',$player_id))
			{
				$alert_data = array(
					'alert'  => TRUE,
					'alert_type'     => "success",
					'alert_message' => "Your Player has been successfully deleted."
				);
			}
			else 
			{
				$alert_data = array(
					'alert'  => TRUE,
					'alert_type'     => "warning",
					'alert_message' => "We encoutered a problem deleting the player. Please try again."
				);
			}
			$this->session->set_userdata($alert_data);
			redirect(base_url()."admin/players");
		}	
	}

	/*
	*
	* MATCHES
	*
	*/







	public function teams()
	{
		$data['content'] = $this->uri->segment(2);
		$this->template->title('Admin', 'Manage Teams');

		$this->template->set_layout('header_footer', 'backend')->
		build('teams.php', $data);
	}

	public function users()
	{
		$data['content'] = $this->uri->segment(2);
		$this->template->title('Admin', 'Manage Users');

		$this->template->set_layout('header_footer', 'backend')->
		build('players.php', $data);
	}


}