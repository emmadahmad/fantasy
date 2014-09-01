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
		        $alert_data = array(
					'alert'  => TRUE,
					'alert_type'     => "success",
					'alert_message' => "The player has been added successfully."
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
		redirect(base_url()."admin/players");
	}
}