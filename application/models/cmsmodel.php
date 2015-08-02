<?php class Cmsmodel extends CI_Model{

		function __construct(){
			parent::__construct();
		
		}

		function list_cms(){
			$this->db->select('*');
			$this->db->from('dt_cms');
			$result=$this->db->get();
			return $result->result_array();
		}
		
		function add_cms($cms_page_name='',$cms_page_name_ar='',$cms_page_content='',$cms_page_content_ar='',$cms_id=0){
			$arr_cms=array('cms_page_name'=>$cms_page_name,
							'cms_page_name_ar'=>$cms_page_name_ar,
							'cms_page_content'=>$cms_page_content,
							'cms_page_content_ar'=>$cms_page_content_ar
						  );	
			$res = '';
			if($cms_id==0){
				$this->db->insert('dt_cms',$arr_cms);
				$res = $this->db->insert_id();
			}else{
				$this->db->where('cms_id',$cms_id);
				$res = $this->db->update('dt_cms',$arr_cms);
			}
			if($res)				
			{
				return 'success';
			}else{
				return 'fail';
			}
			
		}
		
		function get_content($cms_id){
			$this->db->select('*');
			$this->db->from('dt_cms');
			$this->db->where('cms_id',$cms_id);
			$result=$this->db->get();
			return $result->row_array();
		}

	function del_cms($cms_id){
		$this->db->where('cms_id',$cms_id);
		$this->db->delete('dt_cms');
		return 1;
	}		
		
		
}