<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class In_market extends CI_Controller {

	/* default */
	public function index()	{
		$this->load->model("barang");
		$data['headline'] = $this->barang->ambil_headline();

		$this->load->model("barang");
		$data['promo'] = $this->barang->ambil_promo();

		$this->load->model("kategori");
		$data['kategori'] = $this->kategori->ambil();

		$data['cari'] = '';

		$this->load->view("in_market", $data);
	}

	public function kategori($param=null) {
		if ($param == null)
			redirect('/in_market');
		else {
			$this->load->model("barang");
			$data['headline'] = $this->barang->ambil_headline();

			$this->load->model("barang");
			$data['promo'] = $this->barang->ambil_kategori($param, 6, true);

			$this->load->model("kategori");
			$data['kategori'] = $this->kategori->ambil();

			$data['cari'] = '';

			$this->load->view("in_market", $data);
		}
	}

	public function cari($param=null) {
		if ($param == null)
			redirect('/in_market');
		else {
			$this->load->model("barang");
			$data['headline'] = $this->barang->ambil_headline();

			$this->load->model("barang");
			$data['promo'] = $this->barang->ambil_cari($param, 6);

			$this->load->model("kategori");
			$data['kategori'] = $this->kategori->ambil();

			$data['cari'] = $param;

			$this->load->view("in_market", $data);
		}
	}

	/* contact */
	public function contact_us() {
		$this->load->view("contact_us");
	}


}


/* End of file in_market.php */
/* Location: ./application/controllers/in_market.php */
