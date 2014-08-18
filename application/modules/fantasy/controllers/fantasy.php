<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fantasy extends CI_Controller 
{

	public function __construct() 
	{
        parent::__construct();
        $logged_in = 0;

        $this->load->model ( 'fantasy/pages_model', 'pages' );
        $this->load->model ( 'fantasy/generic_model', 'general' );

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
		$data['content'] = $this->uri->segment(2);
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
		$data['content'] = $this->uri->segment(2);
		$this->template->title('Fantasy Cricket', 'Manage');

		$this->template->set_layout('header_footer', 'frontend')->
		build('view_points.php', $data);
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