<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	/* default */
	public function index()	{

	}

	/* daily */
	public function harian() {
		$this->load->view('laporanharian');
	}

	/* monthly */
	public function bulanan() {
		$this->load->view('laporanbulanan');
	}

	/* yearly */
	public function tahunan() {
		$this->load->view('laporantahunan');
	}
}


/* End of file laporan.php */
/* Location: ./application/controllers/laporan.php */
