<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class In_market extends CI_Controller {
	
	/* default */
	public function index()	{
		$this->load->view("in_market");
	}

	/* contact */
	public function contact_us() {
		$this->load->view("contact_us");
	}

	
}


/* End of file in_market.php */
/* Location: ./application/controllers/in_market.php */