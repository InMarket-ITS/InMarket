<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Kategori extends CI_Model {

	function ambil() {
		$query = $this->db->get( 'kategori' );
		return $query;
	}

	function tambah() {

	}

	function ubah() {

	}

	function hapus() {
		
	}
}


/* End of file kategori.php */
/* Location: ./application/models/kategori.php */