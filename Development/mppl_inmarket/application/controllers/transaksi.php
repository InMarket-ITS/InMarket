<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	/* default */
	public function index()	{
		if ($this->session->userdata('hak_akses') != 1 && $this->session->userdata('hak_akses') != 2) {
			redirect(base_url() . 'beranda');
			return;
		}
		$this->load->view('transaksikasir');
	}

	/* print */
	public function cetak() {

	}
}


/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php */
