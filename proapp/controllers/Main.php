<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();

		$this->data['downloads_arr'] = $this->download_array();
	}

	public function index()
	{
		$this->page = 'home';
		$this->data['page_title'] = 'ADVANCED WEAPONS AND EQUIPMENT INDIA LIMITED';

		$this->siteLayout();
	}

	public function rti()
	{
		$this->page = 'rti';
		$this->data['page_title'] = 'AWEIL::RTI';

		$this->siteLayout();
	}

	public function about()
	{
		$this->page = 'about';
		$this->data['page_title'] = 'AWEIL::About';

		$this->siteLayout();
	}

	public function units_division()
	{
		$this->page = 'units_division';
		$this->data['page_title'] = 'AWEIL::Units & Divisions';

		$this->siteLayout();
	}

	public function eng_tech()
	{
		$this->page = 'eng_tech';
		$this->data['page_title'] = 'AWEIL::Engineering & Technology';

		$this->siteLayout();
	}

	public function products()
	{
		$this->page = 'products';
		$this->data['page_title'] = 'AWEIL::Products';

		$this->siteLayout();
	}

	public function tender()
	{
		$this->page = 'tender';
		$this->data['page_title'] = 'AWEIL::Tender';

		$this->siteLayout();
	}

	public function notice()
	{
		$this->page = 'notice';
		$this->data['page_title'] = 'AWEIL::Notice Board';

		$this->siteLayout();
	}

	public function vigilance()
	{
		$this->page = 'vigilance';
		$this->data['page_title'] = 'AWEIL::Vigilance';

		$this->siteLayout();
	}

	public function events()
	{
		$this->page = 'events';
		$this->data['page_title'] = 'AWEIL::Events';

		$this->siteLayout();
	}

	public function contact()
	{
		$this->page = 'contact';
		$this->data['page_title'] = 'AWEIL::Contact';

		$this->siteLayout();
	}

	public function terms()
	{
		$this->page = 'terms';
		$this->data['page_title'] = 'AWEIL::RTI';

		$this->siteLayout();
	}

	public function downloads()
	{
		$this->page = 'downloads';
		$this->data['page_title'] = 'AWEIL::Downloads';

		$this->siteLayout();
	}


	public function manuals_standard()
	{
		$this->page = 'rti/manuals_standard';
		$this->data['page_title'] = 'AWEIL::Manual Standards';

		$this->siteLayout();
	}

	public function operat_proced()
	{
		$this->page = 'rti/operat_proced';
		$this->data['page_title'] = 'AWEIL::Operating Procedures';

		$this->siteLayout();
	}

	public function cmd_message()
	{
		$this->page = 'cmd_message';
		$this->data['page_title'] = 'AWEIL::CMD Message';

		$this->siteLayout();
	}

	public function rti_pio_details()
	{
		$this->page = 'rti/pio_details';
		$this->data['page_title'] = 'AWEIL RTI::PIO Details';

		$this->siteLayout();
	}
}
