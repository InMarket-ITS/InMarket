<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Barang extends CI_Model {

	function ambil() {
		$query = $this->db->get( 'barang' );
		return $query;
	}

	function ambilSatu($id) {
		$this->db->where('ID_BARANG', $id);
		$query = $this->db->get('barang');
		return $query;
	}

	
	function ambil_headline() {
		$this->db->where( 'status = 1' );
		$this->db->order_by( 'rand()' );
		$query = $this->db->get( 'barang', '3' );
		return $query;
	}

	function ambil_promo() {
		$this->db->order_by( 'rand()' );
		$query = $this->db->get( 'barang', '6' );
		return $query;
	}

	function ambil_kategori($param) {
		$this->db->where( 'id_kategori = '.$param );
		$this->db->order_by( 'rand()' );
		$query = $this->db->get( 'barang', '6' );
		return $query;
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