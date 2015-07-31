<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin  extends CI_Controller 
{
	public function __construct()
	{
		
		parent::__construct();
		//$this->load->model('admin/adminusermodel');
		$this->load->model('admin/adminmodel');
		//$this->load->model('admin/common_methods');
	//	$this->load->theme('admin');
		$this->load->helper('auth');
		$this->load->library('pagination');
		$this->load->helper('form');
        $this->load->helper('url');
	}
	
	public function index()
	{
		
		
		if(!isAdminLoggedIn())
		{
			redirect("index.php/admin/admin_login");
		}
		
		
		$data['site_title'] = 'Property Admin';
		//$this->load->view('admin/admin_dashboard', $data);
		$this->load->view('admin/header');
		$this->load->view('admin/index');
		$this->load->view('admin/footer');
		
	}
	
	public function admin_login(){
		
		
	//	echo isAdminLoggedIn();
		
	//	die();
		
		
		if(isAdminLoggedIn())
		{
			redirect("index.php/admin/index");
		}
		$data['login_error_msg']="";
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			//echo $username;
			//echo $password;
			if($this->adminmodel->checkAdminExist($username,$password))
			{
				$data = $this->adminmodel->checkAdminExist($username,$password);
				$this->session->set_userdata('admin_id', $data["adminId"]);
				$this->session->set_userdata('admin_username', $data["admin_username"]);
				
				/*echo $this->session->userdata('admin_id');
				echo $this->session->userdata('admin_username');
				print_r($data);
				die();*/
				redirect("index.php/admin/index");
			}
			else
			{
				$data['login_error_msg'] ='Incorrect username or password!';
				//redirect("index.php/admin/admin_login");
			}
		}
		
		$data['site_title'] = 'Property | Admin Login';
		$this->load->view('admin/admin_login', $data);
	}
	/*public function admin_dashboard(){
		
		$this->load->view('admin/header');
		$this->load->view('admin/admin_dashboard');
		$this->load->view('admin/footer');
	}*/
	
	public function logout()
	{
		
		$this->session->unset_userdata('admin_id');
		$this->session->unset_userdata('admin_username');
		$this->session->set_userdata('success_msg', 'You have successfully logged out!');
		redirect("index.php/admin/index");
	}
	
	public function list_package(){
		
		if(!isAdminLoggedIn())
		{
			redirect("index.php/admin/admin_login");
		}
		
		
		$this->load->model('admin/adminmodel','admin');
		$data['package']=$this->admin->list_package();
		//$this->load->view('admin/admin_dashboard', $data);
		$this->load->view('admin/header');
		$this->load->view('admin/list_package',$data);
		$this->load->view('admin/footer');
		
	
	}
	
	
	
	
	
	
}
?>