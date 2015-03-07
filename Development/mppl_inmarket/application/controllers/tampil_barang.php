<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tampil_barang extends CI_Controller {

	/* default */
	public function index()	{
		if ($this->session->userdata('hak_akses') != 1) {
			redirect(base_url() . 'beranda');
			return;
		}
		
		$this->load->model("barang");
		$data["list"] = $this->barang->ambil();

		print_r($data["list"]);

		$this->load->view("stokbarang", $data);
	}


}


/* End of file tampil_barang.php */
/* Location: ./application/controllers/tampil_barang.php */
