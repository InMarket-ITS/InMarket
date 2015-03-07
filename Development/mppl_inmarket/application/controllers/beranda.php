<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends CI_Controller {

	/* default */
	public function index()	{
		/*
		echo md5('secret-of-life');
		echo '<br/>';
		echo md5('ngene');
		*/

		echo $this->session->userdata('hak_akses');
		if($this->session->userdata('hak_akses') == null) {
			$this->masuk();
		}
		else if ($this->session->userdata('hak_akses') == 1) {
			redirect(base_url() . 'tampil_barang');
		}
		else if ($this->session->userdata('hak_akses') == 2) {
			redirect(base_url() . 'transaksi');
		}
	}

	public function masuk() {

		$this->load->model('autentikasi');

		$id = $this->input->post('ID');
		$pass = $this->input->post('Password');

		if ($id && $pass) {
			$hak_akses = $this->autentikasi->autentikasi($id, $pass);
			if ($hak_akses != -1) {
				$userdata = array('id' => $id, 'hak_akses' => $hak_akses);
				$this->session->set_userdata($userdata);
				$this->index();
			}
			else {
				$data = array ('alert_msg' => 'ID atau kata sandi salah', 'alert_class' => 'alert-danger');
				$this->load->view('login', $data);
			}
		}
		else {
			$this->load->view('login');
		}
	}


	/* logout */
	public function keluar() {
		$this->session->unset_userdata('hak_akses');
		$this->session->unset_userdata('id');
		$this->masuk();
	}
}


/* End of file beranda.php */
/* Location: ./application/controllers/beranda.php */
