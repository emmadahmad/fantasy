<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fantasy extends CI_Controller 
{

	public function __construct() 
	{
        parent::__construct();
        $logged_in = is_client_logged_in();

        $this->load->model ( 'pages_model', 'pages' );
        $this->load->model ( 'generic_model', 'general' );
        $this->load->model ( 'players_model', 'players' );
        $this->load->model ( 'team_players_model', 'team_players' );
        $this->load->model ( 'player_match_stats_model', 'player_stats' );

        $this->load->helper('forms_loader');        

        $this->template->set_partial('head', 'frontend/partials/head');
        $this->template->set_partial('footer', 'frontend/partials/footer');

		if($logged_in)
		{			
			$this->template->set_partial('header', 'frontend/partials/header_logged_in');			
		}
		else
		{			
			$this->template->set_partial('header', 'frontend/partials/header_logged_out');			
		}
    }

	public function index()
	{
		$data['content'] = $this->uri->segment(3);
		$this->template->title('Fantasy Cricket', 'Home');

		$this->template->set_layout('header_footer', 'frontend')->
		build('home.php', $data);
	}

	public function test_session()
	{
		test_session();
	}

	public function logout()
	{
		$userSessionArray = array(
			'is_client_login' => FALSE,
			'user_id' => NULL,
			'user_name' => NULL,
			'email'=> NULL,
			'country' => NULL,
			'gender' => NULL
		);
		set_session($userSessionArray);
		redirect(base_url()."fantasy");
	}

	public function login()
	{
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

		$this->template->title('Fantasy Cricket', 'Login');
		$this->template->set_layout('no_header_no_footer', 'frontend')->
		build('login.php', $data);
	}

	public function signup()
	{
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
		
		$this->template->title('Fantasy Cricket', 'Signup');
		$this->template->set_layout('no_header_no_footer', 'frontend')->
		build('signup.php', $data);
	}

	public function prizes()
	{
		$page = $this->general->get_all_by_key('pages','page_name','prizes');
		$content = $page[0]->page_content;
		$data['content'] = $content;
		$this->template->title('Fantasy Cricket', 'Prizes');

		$this->template->set_layout('header_footer', 'frontend')->
		build('help/prizes.php', $data);
	}
	public function faqs()
	{
		$data['content'] = $this->uri->segment(2);
		$this->template->title('Fantasy Cricket', 'FAQs');

		$this->template->set_layout('header_footer', 'frontend')->
		build('help/faqs.php', $data);
	}
	public function how_to_play()
	{
		$page = $this->general->get_all_by_key('pages','page_name','how_to_play');
		$content = $page[0]->page_content;
		$data['content'] = $content;
		$this->template->title('Fantasy Cricket', 'How To Play');

		$this->template->set_layout('header_footer', 'frontend')->
		build('help/how_to_play.php', $data);
	}
	public function terms()
	{
		$data['content'] = $this->uri->segment(2);
		$this->template->title('Fantasy Cricket', 'Terms and Conditions');

		$this->template->set_layout('header_footer', 'frontend')->
		build('help/terms.php', $data);
	}
	public function contact()
	{
		$data['content'] = $this->uri->segment(2);
		$this->template->title('Fantasy Cricket', 'Contact Us');

		$this->template->set_layout('header_footer', 'frontend')->
		build('help/contact.php', $data);
	}

	public function view_points()
	{
		$data['content'] = $this->uri->segment(2);
		$this->template->title('Fantasy Cricket', 'View Points');

		$this->template->set_layout('header_footer', 'frontend')->
		build('view_points.php', $data);
	}
	public function manage()
	{
		authenticate_client();
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

		$user_id = $this->session->userdata('user_id');
		$data['manager'] = $user_id;
		$team_details = $this->general->get_all_by_key('teams','manager',$user_id);		

		if(empty($team_details))
		{
			$this->template->title('Fantasy Cricket', 'Add Team');
			$this->template->set_layout('header_footer', 'frontend')->
			build('manage/add_team.php', $data);
		}
		else
		{
			$batsmen = $this->players->get_player_stats_by_type(BATSMAN);
			$bowlers = $this->players->get_player_stats_by_type(BOWLER);
			$all_rounders = $this->players->get_player_stats_by_type(ALL_ROUNDER);
			$wicket_keepers = $this->players->get_player_stats_by_type(WICKET_KEEPER);
			$current_lineup = $this->team_players->get_user_players($user_id);
			if($current_lineup)
			{
				$curr_lineup = simplify_team_array($current_lineup);
				$team_value = $this->player_stats->team_value($curr_lineup);
			}
			else
			{
				$team_value = 0;
			}

			$data['team_id'] = $team_details[0]->team_id;
			$data['team_name'] = $team_details[0]->team_name;
			$data['team_points'] = $team_details[0]->points;
			$data['team_cash'] = $team_details[0]->cash;
			$data['team_value'] = $team_value;
			$data['batsmen'] = $batsmen;
			$data['bowlers'] = $bowlers;
			$data['all_rounders'] = $all_rounders;
			$data['wicket_keepers'] = $wicket_keepers;
			$data['current_lineup'] = $current_lineup;
			$data['curr_lineup'] = $curr_lineup;

			//print_array($data);die();


			$this->template->title('Fantasy Cricket', 'Manage Team');
			$this->template->set_layout('header_footer', 'frontend')->
			build('manage/manage.php', $data);
		}
	}
	public function leagues()
	{
		$data['content'] = $this->uri->segment(2);
		$this->template->title('Fantasy Cricket', 'Leagues');

		$this->template->set_layout('header_footer', 'frontend')->
		build('view_points.php', $data);
	}
	public function stats()
	{
		$data['content'] = $this->uri->segment(2);
		$this->template->title('Fantasy Cricket', 'Stats');

		$this->template->set_layout('header_footer', 'frontend')->
		build('view_points.php', $data);
	}
	public function fixtures()
	{
		$data['content'] = $this->uri->segment(2);
		$this->template->title('Fantasy Cricket', 'Fixtures');

		$this->template->set_layout('header_footer', 'frontend')->
		build('fixtures.php', $data);
	}
	public function leaderboard()
	{
		$data['content'] = $this->uri->segment(2);
		$this->template->title('Fantasy Cricket', 'leaderboard');

		$this->template->set_layout('header_footer', 'frontend')->
		build('leaderboard.php', $data);
	}


}