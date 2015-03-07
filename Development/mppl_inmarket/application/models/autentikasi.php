<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Autentikasi extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function autentikasi($id, $pass) {
		$this->db->where('id', $id);
		$this->db->where('password', md5($pass));
		$this->db->select('hak_akses');
		$query = $this->db->get('autentikasi', 1);
		if ($query->num_rows() != 1)
			return -1;
		return $query->row()->hak_akses;
	}


}


/* End of file autentikasi.php */
/* Location: ./application/models/autentikasi.php */
