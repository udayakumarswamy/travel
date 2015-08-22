<?php class Agent extends CI_Controller{

	function __construct(){
		parent::__construct();
		$sess_data =  $this->session->userdata('language');
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
	
	function index(){
		
	}
	
	function add_package($package_id=0){ 
		if(($this->session->userdata('username')!="")){
			$data['title']= 'Welcome';
			$data['username'] = $this->session->userdata('username');
			$data['usertype'] = $this->session->userdata('usertype');
			$this->load->view('home/inner_header',$data);
			$this->load->model('agentmodel','agent');
			$this->load->model('packagemodel','package');
			$data['package_details']=$this->agent->get_package($package_id);
			$data['images']=$this->agent->get_images($package_id);
			$data['countries']=$this->agent->list_country();
			$data['amenities']=$this->package->list_amenities_display();
			$this->load->view('agent/package_form',$data);
			$this->load->view('home/footer');
		}else{
			redirect("index.php/landing/index");
		}	
	}
	function save_package(){
		$package_id=$this->input->post('package_id');
		if($package_id==0 || $package_id=='')
			$package_id=0;
		$package_title=$this->input->post('package_title');
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
		$posted_by_id=$this->session->userdata('userId');
		$upload_files=$this->input->post('files');
		$this->load->model('agentmodel','agent');
		$pkg_id = $this->agent->add_package($package_title,$d_date,$a_date,$package_cost_adult,$package_cost_child,$package_cost_infant,$number_of_seats_adult,$number_of_seats_child,$number_of_seats_infant,$country_id,$amenities,$package_desc,$posted_by_id,$package_id);
		if(empty($package_id)){
			$package_id =  $pkg_id;
		}
		// echo '~~~~~~'.$package_id.'-------'.$upload_files.'~~~~~~';
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

function list_package(){
	$this->load->model('agentmodel','agent');
	if(($this->session->userdata('username')!="")){
		$data['title']= 'Welcome';
		$data['username'] = $this->session->userdata('username');
		$data['usertype'] = $this->session->userdata('usertype');
		$data['result']=$this->agent->list_package();
		$this->load->view('home/inner_header',$data);
		$this->load->view('agent/list_package',$data);
		$this->load->view('home/footer');
	}else{
		redirect("index.php/landing/index");
	}	
}

	function save_amenity(){
		if(($this->session->userdata('username')!="")){
			$aminity_name = $this->input->post('aminity');
			$aminity_status = $this->input->post('amenity_status');
			$aminity_id = $this->input->post('amenity_id');
			$this->load->model('packagemodel','package');
			$result=$this->package->save_amenities($aminity_name,$aminity_status,$aminity_id);
			echo $result;
		}else{
			redirect("index.php/landing/index");
		}

	}
}