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

		$all = $this->penjualan->ambil_faktur($param);

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
	public function bulanan($param=null) {
		if ($this->session->userdata('hak_akses') != 1) {
			redirect(base_url() . 'beranda');
			return;
		}

		$this->load->model('penjualan');

		if ($param == null)
			$param = date('Y-m');

		$all = $this->penjualan->ambil_faktur_waktu($param);

		$this->load->model('list_barang');
		$x=0;
		$data['waktu'][0] = null;
		$data['list'][0] = null;
		foreach ($all->result() as $row) {
			$data['waktu'][$x] = $row->waktu;
			$data['list'][$x++] = $this->list_barang->ambil_faktur($row->id_faktur);
		}

		for ($i=1; $i<13; $i++)
			$data['select'][$i] = "";

		$month = explode("-",$param);

		//echo $month[1];

		$data['select'][(int) $month[1]] = "selected";

		$this->load->view('laporanbulanan', $data);
	}

	/* yearly */
	public function tahunan($param=null) {
		if ($this->session->userdata('hak_akses') != 1) {
			redirect(base_url() . 'beranda');
			return;
		}

		$this->load->model('penjualan');

		if ($param == null)
			$param = date('Y');

		$all = $this->penjualan->ambil_faktur_waktu($param);

		$this->load->model('list_barang');
		$x=1;
		for ($i=1; $i<13; $i++) {
			$data['list'][$i] = 0;
		}
		foreach ($all->result() as $row) {

			$temp = explode("-", $row->waktu);
			//echo $temp[1];
			if (((int)$temp[1]) != $x) {
				$x = (int)$temp[1];
			}

			$temp2 = $this->list_barang->ambil_faktur($row->id_faktur);
			
			$y = 0;
			foreach ($temp2->result() as $rew) {
				$data['list'][$x] += $rew->HARGA_JUAL * $rew->JUMLAH;
			}
		}

		for ($i=2010; $i<=date('Y'); $i++)
			$data['select'][$i] = "";

		$data['select'][$param] = "selected";

		$this->load->view('laporantahunan', $data);
	}
}


/* End of file laporan.php */
/* Location: ./application/controllers/laporan.php */
