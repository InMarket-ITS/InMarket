<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Laporan_join extends CI_Model {

	function ambil($param) {
		$this->db->select( 'barang.nama_barang as nama_barang, SUM(daftar_barang.jumlah) AS jumlah, barang.harga_jual as harga_jual' );
		$this->db->from( 'penjualan' );
		$this->db->from( 'daftar_barang' );
		$this->db->from( 'barang' );
		$this->db->where( 'penjualan.waktu like "%'.$param.'%" AND daftar_barang.id_faktur = penjualan.id_faktur AND daftar_barang.id_barang = barang.id_barang' );
		$this->db->group_by( 'barang.nama_barang' );
		$query = $this->db->get();
		//print_r($query);
		return $query;
	}
}


/* End of file laporan_join.php */
/* Location: ./application/models/laporan_join.php */