<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

  /* default */
  public function index()	{
  }

  public function dataBarang($id) {
    $this->load->model('Barang');
    $query = $this->Barang->ambilSatu($id);
    $barang = $query->row();
    echo json_encode($barang);
  }

}


/* End of file ajax.php */
/* Location: ./application/controllers/ajax.php */
