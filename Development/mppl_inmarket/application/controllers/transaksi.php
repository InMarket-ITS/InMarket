<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	/* default */
	public function index()	{
		$this->load->view('transaksikasir');
	}

	/* print */
	public function cetak() {

	}
}


/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php */
