<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Penjualan extends CI_Model {

	function ambil() {
		$query = $this->db->get( 'penjualan' );
		return $query;
	}

	function ambil_faktur($param) {
		$this->db->select( 'id_faktur' );
		$this->db->where( 'waktu like "%'.$param.'%"' );
		$query = $this->db->get( 'penjualan' );
		//print_r($query);
		return $query;
	}

	function ambil_faktur_waktu($param) {
		$this->db->select( 'id_faktur, waktu' );
		$this->db->where( 'waktu like "%'.$param.'%"' );
		$query = $this->db->get( 'penjualan' );
		//print_r($query);
		return $query;
	}

	
	function tambah($idkasir, $itemlist, $total) {
		$idfaktur = $this->db->query('SELECT MAX(ID_FAKTUR) ID FROM PENJUALAN')->row()->ID + 1;
		$waktu = (new DateTime())->format("Y-m-d H:i:s");
		$data = array (
			'ID_FAKTUR' => $idfaktur,
			'ID_KASIR' => $idkasir,
			'WAKTU' => $waktu,
			'TOTAL_PEMBAYARAN' => $total
		);
		if ($this->db->insert('penjualan', $data)) {
			foreach ($itemlist as $item) {
				$idlistbrg = $this->db->query('SELECT MAX(ID_DAFTAR_BARANG) ID FROM DAFTAR_BARANG')->row()->ID + 1;
				$data = array (
					'ID_DAFTAR_BARANG' => $idlistbrg,
					'ID_FAKTUR' => $idfaktur,
					'ID_BARANG' => $item->id,
					'JUMLAH' => $item->jumlah
				);
				$this->db->insert('daftar_barang', $data);

				$this->db->select('STOK');
				$this->db->where('ID_BARANG', $item->id);
				$stok = $this->db->get('barang')->row()->STOK;
				$stok -= $item->jumlah;

				$data = array ('STOK' => $stok);
				$this->db->where('ID_BARANG', $item->id);
				$this->db->update('barang', $data);
			}
			return true;
		}
		else {
			return false;
		}
	}

	function ubah() {

	}

	function hapus() {
		
	}
}


/* End of file penjualan.php */
/* Location: ./application/models/penjualan.php */