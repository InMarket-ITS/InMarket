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
	public function harian($param=null) {
		if ($this->session->userdata('hak_akses') != 1) {
			redirect(base_url() . 'beranda');
			return;
		}

		$this->load->model('penjualan');

		if ($param == null)
			$param = date('Y-m-d');

		$all = $this->penjualan->ambil_harian($param);

		//echo date('Y-m-d');

		$this->load->model('list_barang');
		$x=0;
		$data['list'][0] = null;
		foreach ($all->result() as $row) {
			$data['list'][$x++] = $this->list_barang->ambil_faktur($row->id_faktur);
		}

		$data['search'] = $param;

		$this->load->view('laporanharian', $data);
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
