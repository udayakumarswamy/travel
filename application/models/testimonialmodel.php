<?php class Testimonialmodel extends CI_Model{

		function __construct(){
			parent::__construct();
		
		}

		function list_testimonial(){
			$this->db->select('*');
			$this->db->from('dt_testimonial');
			$result=$this->db->get();
			return $result->result_array();
		}
		
		function add_testimonial($testimonial_page_name='',$testimonial_page_name_ar='',$testimonial_page_content='',$testimonial_page_content_ar='',$testimonial_id=0){
			$arr_testimonial=array('testimonial_page_name'=>$testimonial_page_name,
							'testimonial_page_name_ar'=>$testimonial_page_name_ar,
							'testimonial_page_content'=>$testimonial_page_content,
							'testimonial_page_content_ar'=>$testimonial_page_content_ar
						  );	
						$res = '';
			if($testimonial_id==0){
				$this->db->insert('dt_testimonial',$arr_testimonial);
				$res =  $this->db->insert_id();
			}else{
				$this->db->where('testimonial_id',$testimonial_id);
				$res = $this->db->update('dt_testimonial',$arr_testimonial);
			}
			return $res;				
			
		}
		
		function get_content($testimonial_id){
		$this->db->select('*');
		$this->db->from('dt_testimonial');
		$this->db->where('testimonial_id',$testimonial_id);
		$result=$this->db->get();
		return $result->row_array();
		
		} 

	function del_testmonial($test_id){
		$this->db->where('testimonial_id',$test_id);
		$this->db->delete('dt_testimonial');
		return 1;
	}
		 
		
}