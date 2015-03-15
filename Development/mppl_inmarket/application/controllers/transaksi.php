<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	/* default */
	public function index()	{
		if ($this->session->userdata('hak_akses') != 1 && $this->session->userdata('hak_akses') != 2) {
			redirect(base_url() . 'beranda');
			return;
		}
		$data['hak_akses'] = $this->session->userdata('hak_akses');
		$this->load->view('transaksikasir', $data);
	}

	/* print */
	public function cetak() {
		define("min_height", 5.76);
		define("row_height", 0.53);
		define("width", 12.51);
		require 'fpdf.php';
		$daftarBarang = json_decode($this->input->post('daftarBarang'));
		$total = $this->input->post('total');
		$itemlist = [];
		foreach ($daftarBarang as $barang) {
			$obj = new stdClass();
			$obj->id = $barang->id;
			$obj->jumlah = $barang->jumlah;
			array_push($itemlist, $obj);
		}

		$this->load->model('Penjualan');
		if ($idfaktur = $this->Penjualan->tambah($this->session->userdata('id_kasir'), $itemlist, $total)) {

			$pdf = new FPDF('L', 'cm', array(width, min_height + (count($daftarBarang) * row_height)));
			$pdf->SetAutoPageBreak(false);
			$pdf->AddFont('Corbel', '', 'Corbel.php');
			$pdf->SetMargins(0.4, 0.5, 0.5);
			$pdf->AddPage();
			$pdf->SetFont('Corbel', '', 16);
			$pdf->Cell(7, 0, 'PT. Indomarka Pertamax', 0, 1);
			$pdf->SetFont('Corbel', '', 13);
			$pdf->Cell(7, 1, 'Jl. Raya no. 29, Keputih', 0, 1);
			$pdf->Cell(7, 0, 'Surabaya', 0, 1);
			$pdf->Image('./market/images/home/coba1.png', 7, 0.37);
			$pdf->Image('./market/images/misc/pembatas.png', 0, 1.96);
			$date = new DateTime();
			$pdf->Cell(7, 1.6, $date->format('d.m.Y - H:i/' . '12345'), 0, 1);
			$pdf->Image('./market/images/misc/pembatas.png', 0, 2.66);
			foreach ($daftarBarang as $barang) {
					$pdf->Cell(5.5, 0, $barang->nama, 0, 0);
					$pdf->Cell(2, 0, $barang->jumlah, 0, 0, 'R');
					$pdf->Cell(2.2, 0, $barang->hargaSatuan, 0, 0, 'R');
					$pdf->Cell(2.3, 0, $barang->hargaTotal, 0, 0, 'R');
					$pdf->Cell(0, 0.5, '', 0, 1);
			}
			$pdf->Image('./market/images/misc/pembatas.png', 0, 2.8 + count($daftarBarang) * row_height);
			$pdf->Cell(6.32, 0);
			$pdf->Cell(3.36, 0.4, 'Total: ', 0, 0);
			$pdf->Cell(2.33, 0.4, $total, 0, 1, 'R');
			$pdf->Image('./market/images/misc/pembatas.png', 0, 3.99 + count($daftarBarang) * row_height);
			$pdf->Cell(0, 2.7, 'Beli di InMarket, Rasakan Bedanya', 0, 1, 'C');
			$pdf->Output();

		}
		else {
			echo "Gagal memasukkan transaksi!";
			echo "<script>
				window.onload = setTimeout(function() {window.location = '" . base_url() ."transaksi/'}, 2500);
			</script>";
		}

	}
}


/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php */
