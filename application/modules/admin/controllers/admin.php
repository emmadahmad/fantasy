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
			
	}

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

	public function deletePage($page_name)
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
			
	}

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

	public function deleteCountry($country_id)
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

	public function players($action=null,$player_id=null)
	{
		$players = $this->players->get_all_country_players();
		$data['players'] = $players;
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
		
		if($player_id != null)
		{
			$player = $this->general->get_all_by_key('players','player_id',$player_id);
			$data_edit['player'] = $player[0];
		}
		
		if($action == null)
		{
			$countries = $this->general->get_all('countries');
			$data['countries'] = $countries;
			$this->template->title('Admin', 'Manage Players');
			$this->template->set_layout('header_footer', 'backend')->
				build('players/players.php', $data);
		}
		else if($action == 'view_player')
		{
			$player_info = $this->players->get_player($player_id);
			$player_stats = $this->players->get_player_stats($player_id);
			$batting_stats = $this->players->get_batting_stats($player_id);
			$bowling_stats = $this->players->get_bowling_stats($player_id);

			$player_info = $player_info[0];
			$player_stats = $player_stats[0];
			$batting_stats = $batting_stats[0];
			$bowling_stats = $bowling_stats[0];

			$data_view['player_info'] = $player_info;
			$data_view['player_stats'] = $player_stats;
			$data_view['batting_stats'] = $batting_stats;
			$data_view['bowling_stats'] = $bowling_stats;


			$this->template->title('Admin', 'View Player Details');
			$this->template->set_layout('header_footer', 'backend')->
				build('players/view_player.php', $data_view);
		}
		else if($action == 'add_player')
		{
			$countries = $this->general->get_all('countries');
			$player_types = $this->general->get_all('player_types');
			$data['countries'] = select_countries(object_to_array($countries));
			$data['player_types'] = select_player_type(object_to_array($player_types));

			$this->template->title('Admin', 'Add New Page');
			$this->template->set_layout('header_footer', 'backend')->
				build('players/add_player.php', $data);
		}
		else if($action == 'edit_player')
		{
			$this->template->title('Admin', 'Update Page');
			$this->template->set_layout('header_footer', 'backend')->
				build('players/edit_player.php', $data_edit);
		}
			
	}







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