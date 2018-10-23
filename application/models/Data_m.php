<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_m extends MY_Model {

	protected $_table_name = 'data';
	protected $_primary_key = 'ID';
	protected $_primary_filter = 'intval';
	protected $_order_by = "ID asc";

	function __construct() {
		parent::__construct();
	}


	function insert($array) {
		$error = parent::insert($array);
		return TRUE;
	}

	function  getdata(){
		$query=$this->db->query('select * from data');
		return $query->result();
	}

}

/* End of file data_m.php */