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

	function get_package_details($package_id){
		
		$this->db->select('*');
		$this->db->from('package_details');
		$this->db->join('countries','package_details.country_id=countries.id');
		$this->db->where('package_id',$package_id);
		$result=$this->db->get();
		
		return $result->row_array();
	}

	function get_package_image_details($package_id){

		$this->db->select('*');
		$this->db->from('package_images');
		$this->db->where('package_id',$package_id);
		$result=$this->db->get();
		return $result->result_array();
	}
	
	function get_search_result($package_country = '',$dept_date='',$arr_date='',$adults='',$childrens='',$sort_type='',$sort=''){
		
		//echo "SELECT * FROM package_details WHERE country_id='$package_country' AND dept_date>='$dept_date' AND arr_date<='$arr_date'";
		$condition = '';
		if($package_country == '') {
			$condition = $condition . " country_id != '' ";
		}
		else {
			$condition = $condition . " country_id='".$package_country."' ";
		}

		if($dept_date != '' && $arr_date != '') {
			$condition = $condition . " AND (dept_date >= '".$dept_date."' AND arr_date <= '".$arr_date."') ";
		}
		elseif($dept_date != '') {
			$condition = $condition . " AND (dept_date >='".$dept_date."') ";
		}
		elseif($arr_date != '') {
			$condition = $condition . " AND (arr_date <='".$arr_date."') ";
		}
		else {
			$condition = $condition . " AND (dept_date >='". date('Y-m-d')."') ";
		}

		if($adults != '' && $adults != 0) {
			$condition = $condition . " AND number_of_seats_adult >= " . $adults;
		}

		if($childrens != '' && $childrens != 0) {
			$condition = $condition . " AND number_of_seats_child >= " . $childrens;
		}

		// echo $condition;
		$order_by='order by dept_date';
		if($sort_type=='alpha')
			$order_by='order by package_title '.$sort;
		if($sort_type=='price')
			$order_by='order by total_cost '.$sort;	
			
		echo "-------SELECT *,SUM(package_cost_adult+package_cost_child) AS total_cost FROM package_details WHERE ".$condition." AND is_active='Y' group by package_id $order_by-------------"; exit;

		$result=$this->db->query("SELECT *,SUM(package_cost_adult+package_cost_child) AS total_cost FROM package_details WHERE ".$condition." AND is_active='Y' group by package_id $order_by");
		$package_arr=$result->result_array();
		
		$data=array();
		$i=0;
		//print_r($package_arr);
		foreach($package_arr as $package){
			$data[$i]['package_title']=$package['package_title'];
			$data[$i]['package_country']=$package_country_name;
			$data[$i]['package_id']=$package['package_id'];
			$data[$i]['dept_date']=$package['dept_date'];
			$data[$i]['arr_date']=$package['arr_date'];
			$data[$i]['total_cost']=$package['total_cost'];	
			$data[$i]['package_cost_infant']=$package['package_cost_infant'];
			$data[$i]['amenities']=$package['amenities'];
			$data[$i]['package_desc']=$package['package_desc'];
			$data[$i]['is_featured_image']=$package['is_featured_image'];
			$i++;
		}
		
		return $data;
	
	}
	function get_search_total_result($package_country_name='',$package_country='',$dept_date='',$arr_date='',$adults='',$childrens='',$sort_type='',$sort=''){
		
		//echo "SELECT * FROM package_details WHERE country_id='$package_country' AND dept_date>='$dept_date' AND arr_date<='$arr_date'";
		$order_by='order by dept_date';
		if($sort_type=='alpha')
			$order_by='order by package_title '.$sort;
		if($sort_type=='price')
			$order_by='order by total_cost '.$sort;	
			
		// $result=$this->db->query("SELECT *,SUM(package_cost_adult+package_cost_child) AS total_cost FROM package_details WHERE country_id='$package_country' AND dept_date>='$dept_date' AND arr_date<='$arr_date' and is_active='Y' group by package_id $order_by");
		$result=$this->db->query("SELECT *,SUM(package_cost_adult+package_cost_child) AS total_cost FROM package_details WHERE is_active='Y' group by package_id $order_by");
		$total_row=$result->num_rows();
		
		
		return $total_row;
	
	}
	
	function get_images($package_id){
		$this->db->select('*');
		$this->db->from('package_images');
		$this->db->where('package_id',$package_id);
		$result=$this->db->get();
		
		return $result->result_array();
	}
	
	function change_status($package_id,$status){
		if($status=='Y')
			$curr_stat='N';
		else
			$curr_stat='Y';
		$arr=array('is_active'=>$curr_stat);
		$this->db->where('package_id',$package_id);
		$this->db->update('package_details',$arr);	
		
		if($curr_stat=='Y')
			return 'Active';
		else
			return 'Inactive';	
	}
	function change_featured($package_id,$status){
		if($status=='Y')
			$curr_stat='N';
		else
			$curr_stat='Y';
		$arr=array('is_featured'=>$curr_stat);
		$this->db->where('package_id',$package_id);
		$this->db->update('package_details',$arr);	
		
		if($curr_stat=='Y')
			return 'YES';
		else
			return 'NO';	
	}
	
	function del_package($package_id){
			$this->db->where('package_id',$package_id);
			$this->db->delete('package_details');
			
			return 1;
	}
	
	function set_featured_image($image_id,$package_id){
		
		$this->db->select('image_files');
		$this->db->from('package_images');
		$this->db->where('file_id',$image_id);
		$result=$this->db->get()->row();
		$image_name=$result->image_files;
		
		$arr=array('is_featured_image'=>$image_name);
		$this->db->where('package_id',$package_id);
		$this->db->update('package_details',$arr);
		return 1;
	}
	
	function save_amenities($amenities='',$amenity_status='',$am_id=0)
	{
		$am_arr=array('amenities_value'=>$amenities,'status'=>$amenity_status);
		if($am_id==0){
			$this->db->insert('additional_amenities',$am_arr);
			return 1;
		}else{
			$this->db->where('id',$am_id);
			$this->db->update('additional_amenities',$am_arr);
			return 2;
		}
	}
	
	function get_amanities_by_id($am_id){
		$this->db->select('*');
		$this->db->from('additional_amenities');
		$this->db->where('id',$am_id);
		$result=$this->db->get()->row_array();
		return $result;
	}
	
	function get_amanities(){
		$this->db->select('*');
		$this->db->from('additional_amenities');
		$result=$this->db->get()->result_array();
		return $result;
	}
	function get_bookings(){
		$this->db->select('*');
		$this->db->from('package_booking a');
		$this->db->join('package_details b','a.package_id=b.package_id');
		$this->db->join('userinfo c', 'a.booked_by=c.userId');
		$this->db->order_by('booking_time','desc');
			
		$result=$this->db->get()->result_array();
		
		return $result;
	}

	function view_booking($bid){
		$this->db->select('*');
		$this->db->from('package_booking a');
		$this->db->join('package_details b','a.package_id=b.package_id');
		$this->db->join('userinfo c', 'a.booked_by=c.userId');
		$this->db->where('a.package_booking_id', $bid);
		$this->db->order_by('booking_time','desc');
			
		$result=$this->db->get()->result_array();
		
		return $result;
	}
		
	
	function del_amenity($am_id){
		$this->db->where('id',$am_id);
		$this->db->delete('additional_amenities');
		return 1;
	}		
	
	function book_package($package_id,$adults=0,$children=0,$infant=0,$user_id,$package_cost){
		$package_details=$this->get_package_details($package_id);
		
		
		
		$booking_array=array(
			'package_id'=>$package_id,
			'adults'=>$adults,
			'children'=>$children,
			'infant'=>$infant,
			'booked_by'=>$user_id,
			'package_cost'=>$package_cost,
			'booking_time'=>time()
			);
		$this->db->insert('package_booking',$booking_array);
		$booking_code='PACK-'.$package_id.'0000'.$this->db->insert_id();	
		$arr_booking_code=array('booking_code'=>$booking_code);
		$booking_id=$this->db->insert_id();
		$this->db->where('package_booking_id',$booking_id);
		$this->db->update('package_booking',$arr_booking_code);
		return $booking_id;
	}

	
	function list_amenities_display(){
		$this->db->select('*');
		$this->db->from('additional_amenities');
		// $this->db->where('status',1);
		$result=$this->db->get()->result_array();
		// print_r($result);exit;
		return $result;
	}
	
}