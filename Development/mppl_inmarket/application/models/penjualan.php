<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Penjualan extends CI_Model {

	function ambil() {
		$query = $this->db->get( 'penjualan' );
		return $query;
	}

	function ambil_harian($param) {
		$this->db->select( 'id_faktur' );
		$this->db->where( 'waktu like "%'.$param.'%"' );
		$query = $this->db->get( 'penjualan' );
		//print_r($query);
		return $query;
	}

	function ambil_bulanan($param) {
		$this->db->where( 'waktu like %'.$param.'%' );
		$query = $this->db->get( 'penjualan' );
		return $query;
	}

	function ambil_tahunan($param) {
		$this->db->where( 'waktu like %'.$param.'%' );
		$query = $this->db->get( 'penjualan' );
		return $query;
	}

	function tambah() {

	}

	function ubah() {

	}

	function hapus() {
		
	}
}


/* End of file penjualan.php */
/* Location: ./application/models/penjualan.php */