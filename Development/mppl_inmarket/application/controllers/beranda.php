<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends CI_Controller {
	
	/* default */
	public function index()	{
		$this->load->view("home");
	}

	/* login */
	public function masuk() {
		
	}

	/* logout */
	public function keluar() {
		
	}
}


/* End of file beranda.php */
/* Location: ./application/controllers/beranda.php */