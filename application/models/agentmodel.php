<?php
if (! defined('BASEPATH')) exit('No direct script access');

class Agentmodel extends CI_Model 
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
	
	function add_package($package_title,$dept_date,$arr_date,$package_cost_adult,$package_cost_child,$package_cost_infant,$number_of_seats_adult,$number_of_seats_child,$number_of_seats_infant,$country_id,$amenities,$package_desc,$posted_by_id,$package_id=0){
	
		$data['package_title']=$package_title;
		$data['dept_date']=$dept_date;
		$data['package_title']=$package_title;
		$data['arr_date']=$arr_date;
		$data['package_cost_adult']=$package_cost_adult;
		$data['package_cost_child']=$package_cost_child;
		$data['package_cost_infant']=$package_cost_infant;
		$data['number_of_seats_adult']=$number_of_seats_adult;
		$data['number_of_seats_child']=$number_of_seats_child;
		$data['number_of_seats_infant']=$number_of_seats_infant;
		$data['country_id']=$country_id;
		$data['amenities']=$amenities;
		$data['package_desc']=$package_desc;
		$data['posted_by_id']=$posted_by_id;
	    $data['package_id']=$package_id;	
		if($package_id==0)
		{	
			$this->db->insert('package_details',$data);
			return $this->db->insert_id();
		}else{
			$this->db->where('package_id',$package_id);
			$this->db->update('package_details',$data);
			return 1;
		}	
	}
	
	function save_uploaded_files($package_id,$files){
	
		$file_arr=explode('~',$files);
		foreach($file_arr as $k=>$v){
			$data['package_id']=$package_id;
			$data['image_files']=$v;
			$this->db->insert('package_images',$data);
			
			
			
		}
	}
	function get_package($package_id){
		$this->db->select('*');
		$this->db->from('package_details');
		$this->db->where('posted_by_id',$this->session->userdata('userId'));
		$this->db->where('package_id',$package_id);
		$result=$this->db->get();
		
		return $result->row_array();
	}
	function get_images($package_id){
		$this->db->select('*');
		$this->db->from('package_images');
		$this->db->where('package_id',$package_id);
		$result=$this->db->get();
		
		return $result->result_array();
	}
	function list_package(){
		$this->db->select('*');
		$this->db->from('package_details');
		$this->db->where('posted_by_id',$this->session->userdata('userId'));
		$result=$this->db->get();
		return $result->result_array();
	}
	
	function list_country(){
		$this->db->select('*');
		$this->db->from('countries');
		$result=$this->db->get();
		return $result->result_array();
	}

	function get_bookings($userId){
		$this->db->select('*');
		$this->db->from('package_booking a');
		$this->db->join('package_details b','a.package_id=b.package_id');
		$this->db->join('userinfo c', 'a.booked_by=c.userId');
		$this->db->where('b.posted_by_id', $userId);
		$this->db->order_by('booking_time','desc');
		$result=$this->db->get()->result_array();
		return $result;
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
