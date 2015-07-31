<?php class Testimonial extends CI_Controller{
		
		function __construct(){
		
			parent::__construct();
			$this->load->helper('auth');
			$this->load->library('pagination');
			$this->load->helper('form');
			$this->load->helper('url');	
			if(!isAdminLoggedIn())
			{
				redirect("index.php/admin/admin_login");
			}
			
		}
		
		function list_testimonial(){
			$this->load->model('testimonialmodel','testimonial');
			$data['testimonial']=$this->testimonial->list_testimonial();
			$this->load->view('admin/header');
			$this->load->view('admin/list_testimonial',$data);
			$this->load->view('admin/footer');
		}
		
		function add_testimonial($testimonial_id=0){
			$this->load->model('testimonialmodel','testimonial');
			$data['testimonial']=$this->testimonial->get_content($testimonial_id);
			$this->load->view('admin/header');
			$this->load->view('admin/add_testimonial',$data);
			$this->load->view('admin/footer');
		}
		
		function save_testimonial(){
			$this->load->model('testimonialmodel','testimonial');
			$testimonial_id=$this->input->post('testimonial_id');
			if($testimonial_id=='' || $testimonial_id==0)
				$testimonial_id=0;
			$testimonial_page_name=$this->input->post('testimonial_page_name');
			$testimonial_page_name_ar=$this->input->post('testimonial_page_name_ar');
			$testimonial_page_content=$this->input->post('testimonial_page_content');
			$testimonial_page_content_ar=$this->input->post('testimonial_page_content_ar');
			
			$testimonial_id=$this->testimonial->add_testimonial($testimonial_page_name,$testimonial_page_name_ar,$testimonial_page_content,$testimonial_page_content_ar,$testimonial_id);
			
			$ret_arr=array('result'=>$testimonial_id);
			echo json_encode($ret_arr);
			
				
		}
		
		


}