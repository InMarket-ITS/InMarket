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
		$post = $this->input->post(NULL, TRUE);
		$total = $this->input->post('total');
		$itemlist = [];
		$len = count($post['id']);
		for ($i=0; $i < $len; $i++) {
			$obj = new stdClass();
			$obj->id = $post['id'][$i];
			$obj->jumlah = $post['jumlah'][$i];
			array_push($itemlist, $obj);
		}

		$this->load->model('Penjualan');
		if ($this->Penjualan->tambah($this->session->userdata('id_kasir'), $itemlist, $total)) {
			echo "Berhasil";
		}
		else {
			echo "GAGAL ZZZ";
		}

	}
}


/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php */
