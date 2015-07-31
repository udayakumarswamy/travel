<?php if (! defined('BASEPATH')) exit('No direct script access');

class Packagemodel extends CI_Model
{
	function __construct(){
		parent::__construct();
	}
	
	function list_featured_package(){
		$this->db->select('*');
		$this->db->from('package_details');
		$this->db->where('is_active','Y');
		$this->db->where('is_featured','Y');
		$result=$this->db->get();
		return $result->result_array();
	}
	
	function list_featured_destination(){
		$this->db->select('*');
		$this->db->from('countries');
		$this->db->where('is_top','Y');
		$result=$this->db->get();
		return $result->result_array();
	}
	
	
}