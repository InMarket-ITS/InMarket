<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelola_barang extends CI_Controller {

	/* default */
	public function index()	{
		if ($this->session->userdata('hak_akses') != 1) {
			redirect(base_url() . 'beranda');
			return;
		}
	}

	/* add */
	public function tambah($message = null, $class = null) {
		if ($this->session->userdata('hak_akses') != 1) {
			redirect(base_url() . 'beranda');
			return;
		}
		$data['alertMsg'] = null;
		$data['alertClass'] = null;
		if ($message != null) {
			if ($class == null)
				$class = "default";
			$data['alertMsg'] = $message;
			$data['alertClass'] = $class;
		}

		$this->load->model('Kategori');
		$kategori = $this->Kategori->ambil()->result();
		$data['kategori'] = $kategori;
		$this->load->view("tambahbarang", $data);
	}

	public function submitTambah() {
		if ($this->session->userdata('hak_akses') != 1) {
			redirect(base_url() . 'beranda');
			return;
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'ID', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|integer|greater_than[-1]');
		$this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|numeric|greater_than[0]');
		$this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|numeric|greater_thatn[0]');

		if ($this->form_validation->run()) {
			$this->load->model('Barang');
			$success = $this->Barang->tambah(
				$this->input->post('id'),
				$this->input->post('nama'),
				$this->input->post('kategori'),
				$this->input->post('harga_beli'),
				$this->input->post('harga_jual'),
				$this->input->post('jual'),
				$this->input->post('keterangan')
			);
			if ($success) {
				$config['upload_path'] = './market/images/home/';
				$config['allowed_types'] = 'gif|jpg|png';
				$filename = $this->input->post('id') . $_FILES['gambar']['name'];
				$filename = preg_replace('/\s/', '_', $filename);
				$config['file_name'] = $filename;
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {
					$this->Barang->update_gambar($this->input->post('id'), $config['upload_path'] . $filename);
					$this->tambah('Berhasil menambahkan barang!', 'success');
				}
				else {
					$this->tambah($this->upload->display_errors() . ' ' . $config['upload_path'] . $filename .
					is_dir($config['upload_path']) ? 'IS DIR' : 'IS NOT DIR ' .
					is_writable($config['upload_path']) ? 'IS WRITABLE' : 'IS NOT WRITABLE', 'warning');
				}
			}
			else {
				$this->tambah('Gagal menambahkan barang! Coba gunakan ID lain', 'danger');
			}
		}
		else {
			$this->tambah('Gagal menambahkan barang! Harap masukkan data barang dengan benar', 'danger');
		}

	}

	public function cari_ubah() {
		if ($this->session->userdata('hak_akses') != 1) {
			redirect(base_url() . 'beranda');
			return;
		}
		$this->load->view('updatebarang');
	}

	/* edit */
	public function ubah($message = null, $class = null) {
		if ($this->session->userdata('hak_akses') != 1) {
			redirect(base_url() . 'beranda');
			return;
		}
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
		if ($this->session->userdata('hak_akses') != 1) {
			redirect(base_url() . 'beranda');
			return;
		}
		$this->ubah('Berhasil mengubah data barang', 'success');
	}

	/* delete */
	public function hapus($message = null, $class = null) {
		if ($this->session->userdata('hak_akses') != 1) {
			redirect(base_url() . 'beranda');
			return;
		}
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
		if ($this->session->userdata('hak_akses') != 1) {
			redirect(base_url() . 'beranda');
			return;
		}
		$this->hapus('Berhasil menghapus data barang', 'success');
	}
}


/* End of file kelola_barang.php */
/* Location: ./application/controllers/kelola_barang.php */
