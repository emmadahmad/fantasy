<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller
{

	public function __construct() 
	{
        parent::__construct();

        $this->load->model ( 'pages_model', 'pages' );
        $this->load->model ( 'countries_model', 'countries' );
        $this->load->model ( 'matches_model', 'matches' );
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

	public function getTeamRules()
	{
		$temp_data = $this->general->get_all('team_rules');
		$temp_data = object_to_array($temp_data);
		$data = array();
		$rules = array();
		foreach ($temp_data as $cont) 
		{
			$data['all_rounders'] = $cont['all_rounders'];
			$data['batsmen'] = $cont['batsmen'];
			$data['bowlers'] = $cont['bowlers'];
			$data['wicket_keepers'] = $cont['wicket_keepers'];

			array_push($rules, $data);
		}
		echo json_encode($rules);
	}

	public function selectCountryMatches()
	{
		$country_id = $this->input->post('country_id');
		if($country_id == 0)
		{
			$data['matches'] = $this->matches->get_all_matches();
		}
		else
		{
			$data['matches'] = $this->matches->get_country_matches($country_id);
		}		
		$matches = $this->template->set_layout('')
			->build('matches/ajax/match_data_view.php', $data, true);
		echo $matches;
	}
}