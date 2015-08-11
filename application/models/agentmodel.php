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

	function get_booking_details($bookingId){
		$this->db->select('*');
		$this->db->from('package_booking a');
		$this->db->join('package_details b','a.package_id=b.package_id');
		$this->db->join('userinfo c', 'a.booked_by=c.userId');
		$this->db->where('a.package_booking_id', $bookingId);
		$this->db->order_by('booking_time','desc');
		$result=$this->db->get()->result_array();
		return $result;
	}

	

}
?>
