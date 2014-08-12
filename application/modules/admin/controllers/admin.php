<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller 
{

	public function __construct() 
	{
        parent::__construct();
        $logged_in = 1;

        $this->load->model ( 'fantasy/pages_model', 'pages' );

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

	public function pages()
	{
		$content = $this->pages->get_pages();
		//$content = $content[0]->page_content;
		//print_array($content);
		$data['content'] = $content;
		$this->template->title('Admin', 'Manage Pages');

		$this->template->set_layout('header_footer', 'backend')->
		build('pages.php', $data);
	}

	public function teams()
	{
		$data['content'] = $this->uri->segment(2);
		$this->template->title('Admin', 'Manage Teams');

		$this->template->set_layout('header_footer', 'backend')->
		build('teams.php', $data);
	}

	public function countries()
	{
		$data['content'] = $this->uri->segment(2);
		$this->template->title('Admin', 'Manage Countries');

		$this->template->set_layout('header_footer', 'backend')->
		build('countries.php', $data);
	}

	public function players()
	{
		$data['content'] = $this->uri->segment(2);
		$this->template->title('Admin', 'Manage Players');

		$this->template->set_layout('header_footer', 'backend')->
		build('players.php', $data);
	}

	public function users()
	{
		$data['content'] = $this->uri->segment(2);
		$this->template->title('Admin', 'Manage Users');

		$this->template->set_layout('header_footer', 'backend')->
		build('players.php', $data);
	}


}