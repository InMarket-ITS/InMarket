<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Barang extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function ambil() {
		$this->db->select('ID_BARANG, ID_KATEGORI, NAMA_BARANG, HARGA_BELI, HARGA_JUAL, STOK');
		
		$query = $this->db->get('');
	}

	function tambah() {

	}

	function ubah() {

	}

	function hapus() {

	}
}


/* End of file barang.php */
/* Location: ./application/models/barang.php */
