<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelola_barang extends CI_Controller {

	/* default */
	public function index()	{

	}

	/* add */
	public function tambah($message = null, $class = null) {
		$data['alertMsg'] = null;
		$data['alertClass'] = null;
		if ($message != null) {
			if ($class == null)
				$class = "default";
			$data['alertMsg'] = $message;
			$data['alertClass'] = $class;
		}
		$this->load->view("tambahbarang", $data);
	}

	public function submitTambah() {
		$this->tambah('Berhasil menambahkan barang', 'success');
	}

	public function cari_ubah() {
		$this->load->view('updatebarang');
	}

	/* edit */
	public function ubah($message = null, $class = null) {
		$data['alertMsg'] = null;
		$data['alertClass'] = null;
		if ($message != null) {
			if ($class == null)
			$class = "default";
			$data['alertMsg'] = $message;
			$data['alertClass'] = $class;
		}
		$this->load->view("tampilaneditbarang", $data);
	}

	public function submitUbah() {
		$this->ubah('Berhasil mengubah data barang', 'success');
	}

	/* delete */
	public function hapus($message = null, $class = null) {
		$data['alertMsg'] = null;
		$data['alertClass'] = null;
		if ($message != null) {
			if ($class == null)
			$class = "default";
			$data['alertMsg'] = $message;
			$data['alertClass'] = $class;
		}
		$this->load->view("deletebarang", $data);
	}

	public function submitHapus() {
		$this->hapus('Berhasil menghapus data barang', 'success');
	}
}


/* End of file kelola_barang.php */
/* Location: ./application/controllers/kelola_barang.php */
