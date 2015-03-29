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
		$this->load->model('barang');
		$data['id'] = $this->barang->max_id()+1;
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
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|integer|greater_than[-1]');
		$this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|numeric|greater_than[-1]');
		$this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|numeric|greater_thatn[-1]');

		if ($this->form_validation->run()) {
			$this->load->model('Barang');
			$success = $this->Barang->tambah(
				$this->input->post('id'),
				$this->input->post('nama'),
				$this->input->post('kategori'),
				$this->input->post('harga_beli'),
				$this->input->post('harga_jual'),
				$this->input->post('jumlah'),
				$this->input->post('keterangan')
			);
			if ($success) {
				$config['upload_path'] = './market/images/home/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_height'] = 512;
				$config['max_width'] = 512;
				$filename = $this->input->post('id') . $_FILES['gambar']['name'];
				$filename = preg_replace('/\s/', '_', $filename);
				$config['file_name'] = $filename;
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {
					$this->Barang->update_gambar($this->input->post('id'), $config['upload_path'] . $filename);
					$this->tambah('Berhasil menambahkan barang!', 'success');
				}
				else {
					$this->tambah('Berhasil menambahkan barang, namun tanpa gambar', 'warning');
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
		$data['kategori'] = [];
		$this->load->model('Kategori');
		$query = $this->Kategori->ambil();
		foreach($query->result() as $row) {
			array_push($data['kategori'], $row);
		}
		$this->load->view('updatebarang', $data);
	}

	/* edit */
	public function ubah($barang = null, $message = null, $class = null) {
		if ($this->session->userdata('hak_akses') != 1) {
			redirect(base_url() . 'beranda');
			return;
		}

		if ($barang == null) {
			$this->cari_ubah();
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
		$data['kategori'] = $this->Kategori->ambil()->result();
		$this->load->model('Barang');
		$query = $this->Barang->ambilSatu($barang);
		$data['barang'] = $query->row();

		$this->load->view("tampilaneditbarang", $data);
	}

	public function submitUbah() {
		$id = null;
		if ($this->session->userdata('hak_akses') != 1) {
			redirect(base_url() . 'beranda');
			return;
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'ID', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|integer|greater_than[-1]');
		$this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|numeric|greater_than[-1]');
		$this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required|numeric|greater_than[-1]');

		if ($this->form_validation->run()) {
			$this->load->model('Barang');
			$success = $this->Barang->ubah(
				$this->input->post('id'),
				$this->input->post('nama'),
				$this->input->post('kategori'),
				$this->input->post('harga_beli'),
				$this->input->post('harga_jual'),
				$this->input->post('jumlah'),
				$this->input->post('keterangan'),
				$this->input->post('status')
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
					$this->ubah($this->input->post('id'), 'Berhasil mengubah data barang', 'success');
				}
				else {
					$this->ubah($this->input->post('id'), 'Berhasil mengubah data barang, namun gagal mengubah gambar', 'warning');
				}
			}
			else {
				$this->ubah($this->input->post('id'), 'Gagal mengubah data barang!', 'danger');
			}
		}
		else {
			$this->ubah($this->input->post('id'), 'Gagal mengubah data barang! Harap masukkan data barang dengan benar', 'danger');
		}
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
		$data['kategori'] = [];
		$this->load->model('Kategori');
		$query = $this->Kategori->ambil();
		foreach($query->result() as $row) {
			array_push($data['kategori'], $row);
		}
		$this->load->view("deletebarang", $data);
	}

	public function submitHapus() {
		if ($this->session->userdata('hak_akses') != 1) {
			redirect(base_url() . 'beranda');
			return;
		}
		$this->load->model('Barang');

		if ($this->Barang->hapus($this->input->get('barang')))
			$this->hapus('Berhasil menghapus data barang', 'success');
		else
			$this->hapus('Gagal menghapus data barang!', 'danger');
	}
}


/* End of file kelola_barang.php */
/* Location: ./application/controllers/kelola_barang.php */
