<?php
if (! defined('BASEPATH')) exit('No direct script access');

class Adminmodel extends CI_Model 
{
	function __construct()
	{
        parent::__construct();
		$this->load->database();
	}
	
	
	function checkAdminExist($username, $password)
	{		
		$query = $this->db->get_where('admins', array('admin_username' => mysql_real_escape_string($username), 'admin_password' => md5(mysql_real_escape_string($password))));
		
		$data = $query->row_array();
		$count = $query->num_rows();
		if($count>0)
			return $data;
		else
			return false;
	}
	
	public function list_package(){
		$this->db->select('*');
		$this->db->from('package_details');
		$this->db->order_by('package_id','desc');
		$result=$this->db->get();
		return $result->result_array();
	
	}

	public function add_package(){
		$this->load->model('country');
		$data['country_list'] = $this->country->get_country();
	}
	
	public function fetch_amenities($id=0){
		//$this->load->model('country');
		$this->db->select('*');
		$this->db->from('additional_amenities');
		$result=$this->db->get();
		
		foreach($result->result_array() as $row) {
			$cn_id = $row['id'];
			$data[$cn_id] = $row['amenities_value'];
		}

		return $data;
		
	}
	
	/*
	
	function admininfo()
	{
		$query = $this->db->get_where('admins');
		
		$data = $query->result_array();
		$count = $query->num_rows();
		
		if($count>0)
			return $data;
		else
			return false;
	}
	
	
	function metainfo()
	{
		$query = $this->db->get_where('meta_settings');
		
		$data = $query->result_array();
		$count = $query->num_rows();
		
		if($count>0)
			return $data;
		else
			return false;
	}
	
	
	function changegeneralsettings()
	{
		$data = array(
			'admin_username' => $this->input->post('admin_username'),
			'admin_email' => $this->input->post('admin_email'),
			'site_title' => $this->input->post('site_title'),
			'admin_address' => $this->input->post('admin_address'),
			'admin_phone' => $this->input->post('admin_phone'),
			'admin_state' => $this->input->post('admin_state'),
			'admin_city' => $this->input->post('admin_city'),
			'admin_zip' => $this->input->post('admin_zip')
		);		
		
		$this->db->where('admin_id', '1');
		$this->db->update('admins', $data);
		
		return true;		
	}
	
	
	function changemetasettings()
	{
		$data = array(
			'meta_title' => $this->input->post('meta_title'),
			'meta_description' => $this->input->post('meta_description'),
			'meta_keywords' => $this->input->post('meta_keywords')
		);		
		
		$this->db->where('meta_id', '1');
		$this->db->update('meta_settings', $data);
		
		return true;		
	}
	
	
	function changePromotionalTextSettings()
	{
		$data = array(
			'promotional_text' => $this->input->post('promotional_text'),
			'promotional_text_after_login' => $this->input->post('promotional_text_after_log')
		);		
		
		$this->db->where('meta_id', '1');
		$this->db->update('meta_settings', $data);
		
		return true;		
	}
	
	
	function checkPasswordExist()
	{		
		$this->db->select('*');
		$this->db->from('admins');
		$this->db->where('admin_password', md5($this->input->post('old_password')));

		$query = $this->db->get();
		
		//echo $this->db->last_query();exit;
		$count = $query->num_rows();
		return $count;
	}
	
	
	function changepassword()
	{
		$data = array(
			'admin_password' => md5($this->input->post('new_password')),
			'admin_original_password' => $this->input->post('new_password')
		);		
		
		$this->db->where('admin_id', '1');
		$this->db->update('admins', $data);
		
		return true;		
	}
	
	
	function getPageById($page)
	{
		$this->db->select('*');
		$this->db->from('pages');
		$this->db->where("page_sef_url", $page);

		$query = $this->db->get();
		
		$data = $query->row_array();
		return $data;
	}
	
	
	function updatepages($page)
	{ 
		$data = array(
		        'page_title' => $this->input->post('pagetitle'),
				'page_content' => htmlentities($this->input->post('content')),
		        'promotional_video' => $this->input->post('promotional_video')
			);
		$this->db->where('page_sef_url', mysql_real_escape_string($page));
		$this->db->update('pages',$data);
	}
	
	function fetchcountry($country_id)
	{
		$this->db->select('*');
		$this->db->from('country');
		$this->db->where("country_id", $country_id);

		$query = $this->db->get(); //echo $this->db->last_query();
		
		$data = $query->row_array();
		return $data;
	}
	*/

}
?>
