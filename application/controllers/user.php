	<?php 
//Store into the constant 'IS_AJAX' whether the request was made via AJAX or not
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
class User extends CI_Controller{
  	function __construct()
	{
        parent::__construct();
		$this->load->model('usermodel');
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

 public function index()
 {
  if(($this->session->userdata('user_name')!=""))
  {
//$this->welcome();
   redirect('user/welcome');
  }
  else{
   $data['title']= 'Home';
 //  $this->load->view('home/header',$data);
    $this->load->view("home/index", $data);
 //  $this->load->view('home/footer',$data);
  }
 }
 public function welcome()
 {
 
  if(($this->session->userdata('user_name')!="")){
   $data['title']= 'Welcome';
//  $this->load->view('home/header_view',$data);
   $this->load->view('home/welcome', $data);
  //$this->load->view('home/footer_view',$data);
  }else{
      redirect("user/index");
  }
  
 }
 public function login()
 {
 
 $this->load->library('form_validation');
 $this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email');
 $this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[4]|max_length[32]');
  
  $data['error']="";
  if($this->form_validation->run() == TRUE)
  {
 
 
  $email=$this->input->post('email');
  $password=md5($this->input->post('pass'));

  $result=$this->usermodel->login($email,$password);
  if($result){
   //$this->welcome();
   redirect('user/welcome');
   }
  else{       
 //  $this->index();
   redirect('user/index');
    }
  
  }else{
  
                  $data['validation_errors'] = validation_errors();
				  $this->load->view('home/index',$data);
  }
  
 }
 public function thank()
 {
  $data['title']= 'Thank';
 // $this->load->view('home/header_view',$data);
  $this->load->view('home/thankyou', $data);
 // $this->load->view('home/footer_view',$data);
 }
 public function registration()
 {
  $this->load->library('form_validation');
  // field name, error message, validation rules
  $this->form_validation->set_rules('user_name', 'User Name', 'trim|required|min_length[4]|xss_clean');
  $this->form_validation->set_rules('email_address', 'Your Email', 'trim|required|valid_email');
  $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
  $this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');
  $data['error']="";
  if($this->form_validation->run() == FALSE)
  {
   //$this->index();
   
    //The form is not valid
            if(IS_AJAX)
            {
                $data['message'] = validation_errors();
                $this->load->view('home/ajax_no_valid',$data);
            }
            else
            {
                $this->load->view('home/index');
            }
   
   
  }
  else
  {          $userName=$this->input->post('user_name');
             $result=$this->usermodel->check_user_exist($userName);
			 if($result)
			 {
                   $data['error']="This username alrady exists";
				   if(IS_AJAX)
					{
						   $this->load->view('home/ajax_response',$data);
					}
					else
					{
						  $this->load->view('home/index');
					}
			  }
			 else{
					
					if( $this->usermodel->add_user()==0){
					$data['error']="Ooopss! There was some problem trying to process the form";
					}
					if(IS_AJAX)
					{
						   $this->load->view('home/ajax_response',$data);
					}
					else
					{
						  $this->load->view('home/index');
					}
  
			  }
           
  
  
  }
 }
 public function logout()
 {
  $newdata = array(
  'user_id'   =>'',
  'user_name'  =>'',
  'user_email'     => '',
  'logged_in' => FALSE,
  );
  $this->session->unset_userdata($newdata );
  $this->session->sess_destroy();
  $this->index();
 }
 public function check_user()
{
 $usr=$this->input->post('name');
 $result=$this->usermodel->check_user_exist($usr);
 if($result)
 {
  echo "false";
  }
 else{
  echo "true";
  }
}
public function check_email_exists($email){
	$rows=$this->usermodel->check_email_exist($email);
	if($rows>0){
		$result=1;
	}else{
		$result=0;
	}
	$ret_arr=array('result'=>$result);
	echo json_encode($ret_arr);
}

function list_bookings(){
  if(!empty($this->session->userdata('userId')))
  {
    $data['title']= 'Welcome';
    $data['username'] = $this->session->userdata('username');
    $data['usertype'] = $this->session->userdata('usertype');
    $this->load->model('usermodel','user');
    $data['bookings']=$this->user->get_bookings($this->session->userdata('userId'));
    $this->load->view('home/inner_header',$data);
    // print_r($data['bookings']);
    $this->load->view('agent/list_booking', $data);
    $this->load->view('home/footer',$data);
  }else{
    redirect('/landing');
  }
}



}
/* End of file user.php */
/* Location: ./application/controllers/user.php */