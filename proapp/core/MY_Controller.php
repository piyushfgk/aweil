
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

        // self::$_lang = $_REQUEST['lang'] ?? $this->session->userdata('lang');
		$this->siteLanguage();
		$this->setDefaultPageTitle();

	}

	protected function setDefaultPageTitle()
	{
		$this->data['page_title'] = "AWEIL";
	}

	protected function siteLanguage()
	{
		$cookie_expire_days = 15;

		self::$_lang = $_REQUEST['lang'] ?? get_cookie('sitelang');

		if (in_array(self::$_lang, ['en','hi']) === false) self::$_lang = 'en';

        // $this->session->set_userdata('lang', self::$_lang);
		set_cookie('sitelang', self::$_lang, 3600 * 24 * $cookie_expire_days);

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

	public function download_array()
	{

		return array(
			(object) array(
				"blink" => true,
				"sub_en" => "Application form for the post of Chartered Accountant March 2023",
				"sub_hi" => "चार्टर्ड एकाउंटेंट मार्च 2023 के पद के लिए आवेदन पत्र",
				"links" => array(
					(object) array(
						"content_en" => "Download", "href_en" => "/download/recruitment/March2023/Application Form March 2023.pdf",
						"content_hi" => "डाउनलोड", "href_hi" => "/download/recruitment/March2023/Application Form March 2023.pdf"
					),
				),
			),
			(object) array(
				"blink" => true,
				"sub_en" => "Terms and conditions for the post of Chartered Accountant March 2023",
				"sub_hi" => "चार्टर्ड अकाउंटेंट पद के लिए नियम व शर्तें मार्च 2023",
				"links" => array(
					(object) array(
						"content_en" => "Download", "href_en" => "/download/recruitment/March2023/CA terms and conditions - MARCH 2023.pdf",
						"content_hi" => "डाउनलोड", "href_hi" => "/download/recruitment/March2023/CA terms and conditions - MARCH 2023.pdf"
					),
				),
			),
			(object) array(
				"blink" => true,
				"sub_en" => "Terms and conditions for the post of Sr. Manager – HR March 2023",
				"sub_hi" => "सीनियर मैनेजर के पद के लिए नियम व शर्तें - एचआर मार्च 2023",
				"links" => array(
					(object) array(
						"content_en" => "Download", "href_en" => "/download/recruitment/March2023/Sr. HR Manager Terms and Conditions March 2023.pdf",
						"content_hi" => "डाउनलोड", "href_hi" => "/download/recruitment/March2023/Sr. HR Manager Terms and Conditions March 2023.pdf"
					),
				),
			),
			(object) array(
				"blink" => true,
				"sub_en" => "Terms and conditions for the post of Sr. Manager – IT March 2023",
				"sub_hi" => "वरिष्ठ प्रबंधक के पद के लिए नियम व शर्तें - आईटी मार्च 2023",
				"links" => array(
					(object) array(
						"content_en" => "Download", "href_en" => "/download/recruitment/March2023/Sr. Manager IT Terms and Conditions March 2023.pdf",
						"content_hi" => "डाउनलोड", "href_hi" => "/download/recruitment/March2023/Sr. Manager IT Terms and Conditions March 2023.pdf"
					),
				),
			),
			(object) array(
				"blink" => true,
				"sub_en" => "Terms and conditions for the post of Manager - HR March 2023",
				"sub_hi" => "प्रबंधक के पद के लिए नियम व शर्तें - मानव संसाधन मार्च 2023",
				"links" => array(
					(object) array(
						"content_en" => "Download", "href_en" => "/download/recruitment/March2023/HR Manager Terms and Conditions-March 2023.pdf",
						"content_hi" => "डाउनलोड", "href_hi" => "/download/recruitment/March2023/HR Manager Terms and Conditions-March 2023.pdf"
					),
				),
			),
			(object) array(
				"blink" => true,
				"sub_en" => "Terms and conditions for the post of Assistant Manager – IT March 2023",
				"sub_hi" => "सहायक प्रबंधक के पद के लिए नियम व शर्तें - आईटी मार्च 2023",
				"links" => array(
					(object) array(
						"content_en" => "Download", "href_en" => "/download/recruitment/March2023/Assistant Manager IT Terms and Conditions March 2023.pdf",
						"content_hi" => "डाउनलोड", "href_hi" => "/download/recruitment/March2023/Assistant Manager IT Terms and Conditions March 2023.pdf"
					),
				),
			),
			(object) array(
				"blink" => false,
				"sub_en" => "Result for the post of Chartered Accountant Ref : Advt. No. AWEIL /02/2022",
				"sub_hi" => "चार्टर्ड एकाउंटेंट पद के लिए परिणाम: विज्ञापन। सं. AWEIL /02/2022",
				"links" => array(
					(object) array(
						"content_en" => "Download", "href_en" => "/download/recruitment/Result CA.pdf",
						"content_hi" => "डाउनलोड", "href_hi" => "/download/recruitment/Result CA.pdf"
					),
				),
			),
			(object) array(
				"blink" => false,
				"sub_en" => "Vigilance setup in AWEIL",
				"sub_hi" => "AWEIL . में सतर्कता सेटअप",
				"links" => array(
					(object) array(
						"content_en" => "Download", "href_en" => "/download/Vigilance Setup in AWEIL.pdf",
						"content_hi" => "डाउनलोड", "href_hi" => "/download/Vigilance Setup in AWEIL.pdf"
					),
				),
			),
			(object) array(
				"blink" => false,
				"sub_en" => "AiDef - Details of AI projects for perusal and innovation ideas",
				"sub_hi" => "AiDef - अवलोकन और नवाचार विचारों के लिए एआई परियोजनाओं का विवरण",
				"links" => array(
					(object) array(
						"content_en" => "Download", "href_en" => "/download/ai-2022.pdf",
						"content_hi" => "डाउनलोड", "href_hi" => "/download/ai-2022.pdf"
					),
				),
			),
			(object) array(
				"blink" => false,
				"sub_en" => "Requirement of Chartered Accountant on Contract (Advt. No. AWEIL/02/2022)",
				"sub_hi" => "अनुबंध पर चार्टर्ड एकाउंटेंट की आवश्यकता (विज्ञापन संख्या AWEIL/02/2022)",
				"links" => array(
					(object) array(
						"content_en" => "Application Form", "href_en" => "/download/recruitment/Form -POST-CA.pdf",
						"content_hi" => "आवेदन पत्र", "href_hi" => "/download/recruitment/Form -POST-CA.pdf"
					),
					(object) array(
						"content_en" => "Terms and conditions", "href_en" => "/download/recruitment/CA terms and conditions - OCT 2022.pdf",
						"content_hi" => "नियम और शर्तें", "href_hi" => "/download/recruitment/CA terms and conditions - OCT 2022.pdf"
					),
				),
			),
			(object) array(
				"blink" => false,
				"sub_en" => "Requirement of Company Secretary on Contract (Advt. No. AWEIL/02/2022)",
				"sub_hi" => "अनुबंध पर कंपनी सचिव की आवश्यकता (विज्ञापन संख्या AWEIL/02/2022)",
				"links" => array(
					(object) array(
						"content_en" => "दिनांक 21.09.2022 को आयोजित साक्षात्कार का परिणाम चयनित अभ्यर्थी का नाम -
						<br/><strong>1. श्री मनीष कुमार सिंह</strong>", "href_en" => "#",
						"content_hi" => "Result of Inteview held on 21.09.2022, name of selected candidate -
						<br/><strong>1. Shri Manish Kumar Singh</strong>", "href_hi" => "#"
					),
				),
			),
			(object) array(
				"blink" => false,
				"sub_en" => "Requirement of Manager - HR on Contract (Advt. No. AWEIL/02/2022)",
				"sub_hi" => "प्रबंधक की आवश्यकता - अनुबंध पर मानव संसाधन (विज्ञापन संख्या AWEIL/02/2022)",
				"links" => array(
					(object) array(
						"content_en" => "Application Form", "href_en" => "/download/recruitment/Form - Manager HR.pdf",
						"content_hi" => "Terms and conditions", "href_hi" => "/download/recruitment/Form - Manager HR.pdf"
					),
					(object) array(
						"content_en" => "Download", "href_en" => "/download/recruitment/HR Manager Terms and Conditions.pdf",
						"content_hi" => "नियम और शर्तें", "href_hi" => "/download/recruitment/HR Manager Terms and Conditions.pdf"
					),
				),
			),
		);
	}
}
