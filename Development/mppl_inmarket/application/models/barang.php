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

	function ambil_kategori($param, $num=0, $rand=false) {
		$this->db->where( 'id_kategori = '.$param );
		if ($rand)
			$this->db->order_by( 'rand()' );
		if ($num != 0)
			$query = $this->db->get('barang', $num);
		else
			$query = $this->db->get('barang');
		return $query;
	}

	function tambah($id, $nama_barang, $id_kategori, $harga_beli, $harga_jual, $stok, $keterangan) {
		$item = array (
			'ID_BARANG' => $id,
			'NAMA_BARANG' => $nama_barang,
			'ID_KATEGORI' => $id_kategori,
			'HARGA_BELI' => $harga_beli,
			'HARGA_JUAL' => $harga_jual,
			'STOK' => $stok,
			'KETERANGAN' => $keterangan,
			'DISKON' => 0,
			'STATUS' => 0
		);
		if ($this->db->insert('barang', $item))
			return true;
		else
			return false;
	}

	function update_gambar($id, $gambar) {
		$update = array(
			'GAMBAR' => $gambar
		);
		$this->db->where('ID_BARANG', $id);
		if ($this->db->update('barang', $update))
			return true;
		else return false;
	}


	function ubah($id, $nama_barang, $id_kategori, $harga_beli, $harga_jual, $stok, $keterangan, $status) {
		$item = array (
			'NAMA_BARANG' => $nama_barang,
			'ID_KATEGORI' => $id_kategori,
			'HARGA_BELI' => $harga_beli,
			'HARGA_JUAL' => $harga_jual,
			'STOK' => $stok,
			'KETERANGAN' => $keterangan,
			'DISKON' => 0,
			'STATUS' => $status,
		);
		$this->db->where('ID_BARANG', $id);
		if ($this->db->update('barang', $item))
			return true;
		else
			return false;
	}

	function hapus($id) {
		$this->db->where('ID_BARANG', $id);
		if ($this->db->delete('barang'))
			return true;
		else
			return false;
	}

	function ambil_cari($param, $num=0) {
		$this->db->where( 'nama_barang like "%'.$param.'%"' );
		if ($num != 0)
			$query = $this->db->get('barang', $num);
		else
			$query = $this->db->get('barang');
		return $query;
	}

	function max_id() {
		$this->db->select_max('ID_BARANG');
		$query = $this->db->get('barang');
		return $query->row()->ID_BARANG;
	}
}


/* End of file barang.php */
/* Location: ./application/models/barang.php */
