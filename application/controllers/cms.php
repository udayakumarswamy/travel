<?php class Cms extends CI_Controller{
		
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
			if( !empty($this->session->userdata('language')))
			{
				if($this->session->userdata('language')=='english')
				{
					$this->lang->load('landing', 'english');
				}
				if($this->session->userdata('language')=='arabic')
				{
					$this->lang->load('landing', 'arabic');
				}
			}
			else{
				$this->session->set_userdata('language','english');
				$this->lang->load('landing', 'english');
			}
		}
		
		function list_cms(){
			$this->load->model('cmsmodel','cms');
			$data['cms']=$this->cms->list_cms();
			$this->load->view('admin/header');
			$this->load->view('admin/list_cms',$data);
			$this->load->view('admin/footer');
		}
		
		function add_cms($cms_id=0){
			$this->load->model('cmsmodel','cms');
			$data['cms']=$this->cms->get_content($cms_id);
			$this->load->view('admin/header');
			$this->load->view('admin/add_cms',$data);
			$this->load->view('admin/footer');
		}
		
		function save_cms(){
			// echo '<pre>';print_r($this->input->post());exit;
			$this->load->model('cmsmodel','cms');
			$cms_id=$this->input->post('cms_id');
			if($cms_id=='' || $cms_id==0)
				$cms_id=0;
			$cms_page_name= $this->input->post('cms_page_name');
			$cms_page_name_ar = $this->input->post('cms_page_name_ar');
			$cms_page_content = strip_tags(htmlentities($this->input->post('cms_page_content')));
			$cms_page_content_ar = strip_tags(htmlentities($this->input->post('cms_page_content_ar')));
			$cms_id=$this->cms->add_cms($cms_page_name,$cms_page_name_ar,$cms_page_content,$cms_page_content_ar,$cms_id);
			$ret_arr=array('result'=>$cms_id);
			echo json_encode($ret_arr);
		}
		
		


}