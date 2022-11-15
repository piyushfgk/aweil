
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	public $template = array();
	public $data = array();
    public static $_lang = 'en';

	public function __construct()
	{
		parent::__construct();

        self::$_lang = $_REQUEST['lang'] ?? $this->session->userdata('lang');

        if (in_array(self::$_lang, ['en','hi']) === false) self::$_lang = 'en';

        $this->session->set_userdata('lang', self::$_lang);

        $this->data['page_title'] = "AWEIL";
	}

	/**
	 * Global website layout function
	 */
	protected function siteLayout()
	{
		if (!file_exists(APPPATH . 'views/' . self::$_lang . "/" . $this->page . '.php')) {
			// Whoops, we don't have a page for that!
			show_404();
		}

        $this->data['title'] = $this->data['page_title'];
		$this->template['nav'] = $this->load->view(self::$_lang . "/" . "layout/nav", $this->data, TRUE);
		$this->template['header'] = $this->load->view(self::$_lang . "/" . "layout/header", $this->data, TRUE);
		$this->template['body'] = $this->load->view(self::$_lang . "/" . $this->page, $this->data, TRUE);
		$this->template['footer'] = $this->load->view(self::$_lang . "/" . "layout/footer", $this->data, TRUE);

		$this->load->view(self::$_lang . "/" . 'layout/main', $this->template);
	}
}