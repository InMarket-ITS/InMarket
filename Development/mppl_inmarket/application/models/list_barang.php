<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class List_barang extends CI_Model {

	function ambil() {
		$query = $this->db->get( 'daftar_barang' );
		return $query;
	}

	function ambil_faktur($param) {
		$this->db->from( 'barang' );
		$this->db->where( 'daftar_barang.id_faktur = '.$param.' AND daftar_barang.id_barang = barang.id_barang' );
		$query = $this->db->get( 'daftar_barang' );
		//print_r($query);
		return $query;
	}

	function tambah() {

	}

	function ubah() {

	}

	function hapus() {
		
	}
}


/* End of file list_barang.php */
/* Location: ./application/models/list_barang.php */