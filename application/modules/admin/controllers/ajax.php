<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller
{

	public function __construct() 
	{
        parent::__construct();

        $this->load->model ( 'pages_model', 'pages' );
        $this->load->model ( 'countries_model', 'countries' );
        $this->load->model ( 'players_model', 'players' );
        $this->load->model ( 'generic_model', 'general' );
    }

	public function index()
	{		
		$data['content'] = "HELLO";
		$this->template->title('Admin', 'Dashboard');

		$this->template->set_layout('header_footer', 'backend')->
		build('dashboard.php', $data);
	}

	public function selectCountry()
	{
		$country_id = $this->input->post('country_id');
		if($country_id == 0)
		{
			$data['players'] = $this->players->get_all_country_players($country_id);
		}
		else
		{
			$data['players'] = $this->players->get_country_players($country_id);
		}		
		$players = $this->template->set_layout('')
			->build('players/ajax/player_data_view.php', $data, true);
		echo $players;
	}
}