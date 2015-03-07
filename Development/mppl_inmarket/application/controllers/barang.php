<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang extends CI_Controller {

	/* default */
	public function index()	{
		if ($this->session->userdata('hak_akses') != 1) {
			redirect(base_url() . 'beranda');
			return;
		}
		

		$this->load->view("stokbarang");
	}

}


/* End of file barang.php */
/* Location: ./application/controllers/barang.php */
