<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Kategori extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function ambil() {
    $query = $this->db->get('kategori');
    return $query;
  }

}


/* End of file kategori.php */
/* Location: ./application/models/kategori.php */
