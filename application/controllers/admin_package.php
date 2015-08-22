<?php class Admin_package extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			$this->load->helper('auth');
			$this->load->library('pagination');
			$this->load->helper('form');
			$this->load->helper('url');
			$sess_data = $this->session->userdata('language');
			if( !empty($sess_data))
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

	public function add_package($package_id=0)
	{
		if(!isAdminLoggedIn())
		{
			redirect("index.php/admin/admin_login");
		}

		//$this->load->view('admin/admin_dashboard', $data);
		$this->load->model('country');
		$data['country_list'] = $this->country->get_country_ids();
		$this->load->model('packagemodel','package');
		$this->load->model('adminmodel','admin');
		$data['package_details']=$this->package->get_package_details($package_id);
		$data['images']=$this->package->get_images($package_id);
		$data['amenities_list'] = $this->admin->fetch_amenities();
		// echo '<pre>';print_r($data);exit;
		$this->load->view('admin/header');
		$this->load->view('admin/add_package',$data);
		$this->load->view('admin/footer');
	}
	
	function save_package(){
		// echo '<pre>';print_r($this->input->post());exit;
		 $package_id=$this->input->post('package_id');
		 if($package_id==0 || $package_id=='')
		 	$package_id=0;
		 $package_title=$this->input->post('package_title');
		 $package_title_in_arabic=$this->input->post('package_title_in_arabic');
		 $dept_date=$this->input->post('dept_date');
		 $dep_arr=explode('/',$dept_date);
		 $d_date=$dep_arr[2].'-'.$dep_arr[0].'-'.$dep_arr[1];
		 $arr_date=$this->input->post('arr_date');
		 $a_arr=explode('/',$arr_date);
		 $a_date=$a_arr[2].'-'.$a_arr[0].'-'.$a_arr[1];
		 $package_cost_adult=$this->input->post('package_cost_adult');
		 $package_cost_child=$this->input->post('package_cost_child');
		 $package_cost_infant=$this->input->post('package_cost_infant');
		 $number_of_seats_adult=$this->input->post('number_of_seats_adult');
		 $number_of_seats_child=$this->input->post('number_of_seats_child');
		 $number_of_seats_infant=$this->input->post('number_of_seats_infant');
		 $country_id=$this->input->post('country_id');
		 $amenities=$this->input->post('amenities');
		 
		 $package_desc=$this->input->post('package_desc');
		 if($this->input->post('posted_by_id')=='' || $this->input->post('posted_by_id')==0)
		 	$posted_by_id=9999;
		 else
		 	$posted_by_id=$this->input->post('posted_by_id');
			
				
		 $upload_files=$this->input->post('files');
		 $this->load->model('agentmodel','agent');
		 $package_id=$this->agent->add_package($package_title,$d_date,$a_date,$package_cost_adult,$package_cost_child,$package_cost_infant,$number_of_seats_adult,$number_of_seats_child,$number_of_seats_infant,$country_id,$amenities,$package_desc,$posted_by_id,$package_id,$package_title_in_arabic);
		 
		 $this->agent->save_uploaded_files($package_id,$upload_files);
		 $ret_arr=array('result'=>$package_id);
		 echo json_encode($ret_arr);
			
		}
		
		function upload(){
	
$output_dir = "uploads/";
if(isset($_FILES["myfile"]))
{
	$ret = array();

	$error =$_FILES["myfile"]["error"];
	//You need to handle  both cases
	//If Any browser does not support serializing of multiple files using FormData() 
	if(!is_array($_FILES["myfile"]["name"])) //single file
	{
 	 	$fileName = $_FILES["myfile"]["name"];
 		move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
    	$ret[]= $fileName;
	}
	else  //Multiple files, file[]
	{
	  $fileCount = count($_FILES["myfile"]["name"]);
	  for($i=0; $i < $fileCount; $i++)
	  {
	  	$fileName = $_FILES["myfile"]["name"][$i];
		move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$fileName);
	  	$ret[]= $fileName;
	  }
	
	}
    echo json_encode($ret);
 }
 }
function  change_status()
{
	$package_id=$this->input->post('package_id');
	$curr_stat=$this->input->post('curr_stat');
	$this->load->model('packagemodel','package');
	$result=$this->package->change_status($package_id,$curr_stat);
	$ret_arr=array('result'=>$result);
	echo json_encode($ret_arr);
	
	
}
function  change_featured()
{
	$package_id=$this->input->post('package_id');
	$curr_stat=$this->input->post('curr_stat');
	$this->load->model('packagemodel','package');
	$result=$this->package->change_featured($package_id,$curr_stat);
	$ret_arr=array('result'=>$result);
	echo json_encode($ret_arr);
	
	
}

function del_package(){
	$package_id=$this->input->post('package_id');
	$this->load->model('packagemodel','package');
	$result=$this->package->del_package($package_id);
	$ret_arr=array('result'=>$result);
	echo json_encode($ret_arr);
}
	function set_featured_image(){
		$image_id=$this->input->post('image_id');
		$package_id=$this->input->post('package_id');
		$this->load->model('packagemodel','package');
		$result=$this->package->set_featured_image($image_id,$package_id);
		$ret_arr=array('result'=>$result);
		echo json_encode($ret_arr);
		
	}
	
	function add_amenities($amenities_id=0){
		if(!isAdminLoggedIn())
		{
			redirect("index.php/admin/admin_login");
		}
		$this->load->model('packagemodel','package');
		$data['amenities'] = $this->package->get_amanities_by_id($amenities_id);
		$this->load->view('admin/header');
		$this->load->view('admin/amenities_add',$data);
		$this->load->view('admin/footer');
	}
	
	function list_amenities(){
		if(!isAdminLoggedIn())
		{
			redirect("index.php/admin/admin_login");
		}
		$this->load->model('packagemodel','package');
		$data['amenities']=$this->package->get_amanities();
		$this->load->view('admin/header');
		$this->load->view('admin/list_amenities',$data);
		$this->load->view('admin/footer');

	}
	
	function save_amenities(){
		// echo '<pre>';print_r($this->input->post());exit;
		$amenities=$this->input->post('amenities');
		$amenity_status=$this->input->post('amenity_status');
		$am_id=$this->input->post('id');
		$this->load->model('packagemodel','package');
		$result=$this->package->save_amenities($amenities,$amenity_status,$am_id);
		$ret_arr = array('result'=>$result);
		echo json_encode($ret_arr);
	}
	
	function del_amenity(){
	$am_id=$this->input->post('am_id');
	$this->load->model('packagemodel','package');
	$result=$this->package->del_amenity($am_id);
	$ret_arr=array('result'=>$result);
	echo json_encode($ret_arr);
}
	function list_bookings(){
		if(!isAdminLoggedIn())
		{
			redirect("index.php/admin/admin_login");
		}
		$this->load->model('packagemodel','package');
		$data['bookings']=$this->package->get_bookings();
		$this->load->view('admin/header');
		$this->load->view('admin/list_bookings',$data);
		$this->load->view('admin/footer');

	}
	function view_booking($bid){
		if(!isAdminLoggedIn())
		{
			redirect("index.php/admin/admin_login");
		}
		$this->load->model('packagemodel','package');
		$data['bookings']=$this->package->view_booking($bid);
		$this->load->view('admin/header');
		$this->load->view('admin/view_booking',$data);
		$this->load->view('admin/footer');

	}
}