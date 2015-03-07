<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	/* default */
	public function index()	{
		if ($this->session->userdata('hak_akses') != 1) {
			redirect(base_url() . 'beranda');
			return;
		}
	}

	/* daily */
	public function harian() {
		if ($this->session->userdata('hak_akses') != 1) {
			redirect(base_url() . 'beranda');
			return;
		}
		$this->load->view('laporanharian');
	}

	/* monthly */
	public function bulanan() {
		if ($this->session->userdata('hak_akses') != 1) {
			redirect(base_url() . 'beranda');
			return;
		}
		$this->load->view('laporanbulanan');
	}

	/* yearly */
	public function tahunan() {
		if ($this->session->userdata('hak_akses') != 1) {
			redirect(base_url() . 'beranda');
			return;
		}
		$this->load->view('laporantahunan');
	}
}


/* End of file laporan.php */
/* Location: ./application/controllers/laporan.php */
