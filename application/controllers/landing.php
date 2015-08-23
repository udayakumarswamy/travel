<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Landing  extends CI_Controller 

{

	function __construct(){

		parent::__construct();	

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

	

	function index(){
		//$this->load->view('home/index');
		// echo '!!!!!'.$this->session->userdata('language').'#######';
		$data['title']= 'Home';
		$this->load->model('packagemodel','package');
		$this->load->model('testimonialmodel','testimonial');
		$this->load->model('cmsmodel','cms');
		$this->load->model('country','country');

		if($this->session->userdata('language')=='english')
		$data['postfix']='';
		else
		$data['postfix']='_ar';	
		$data['countries'] = $this->country->get_country_ids();
		$data['featured']=$this->package->list_featured_package();
		$data['destination']=$this->package->list_featured_destination();
		$data['testimonials']=$this->testimonial->list_testimonial();
		$data['cms_about']=$this->cms->get_content(1);
		$this->load->view('home/header',$data);
		$this->load->view("home/index", $data);
		$this->load->view('home/footer',$data);
	}

	

	public function login()

	 {

	 

	

	  $this->load->model('usermodel','usermod');

	  $email=$this->input->post('email');

	  $password=md5($this->input->post('pass'));

	

	  $result=$this->usermod->login($email,$password);

	  $ret_arr=array('result'=>$result);

	  echo json_encode($ret_arr);

	  

	 

	  

	 }

	 

	 public function registration()

	 {

		$this->load->model('usermodel');

		$email = $this->input->post('email_address');

		$ret_arr=array();

		



		if($email){

		    $result=$this->usermodel->check_email_exist($email);

			

			if($result)

			{

			   $ret_arr['error']="This email alrady exists";

			   $ret_arr['success']  =false;

			}

			else{

				$activation =  md5(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));

				$user_id=$this->usermodel->add_user($activation);

				if( $user_id==0){

					$ret_arr['error']="Ooopss! There was some problem trying to process the form";

					$ret_arr['success']  =false;

				}else{

				  $sub="Registration Confirmation";	

				  $msg="Dear User,\nPlease click on below URL or paste into your browser to verify your Email Address\n\n http://midclassified.com/property/index.php/landing/verify/".$activation."\n"."\n\nThanks\nAdmin Team";

				  $from="admin@admin.com";

				  $from_msg="Admin Team";

				  $this->sendEmail($email,$sub,$msg,$from,$from_msg);	

					

				  $ret_arr['error']=false;

				  $ret_arr['success']  =true;

				  $ret_arr['user_id']=$user_id;

				}

				

			

			 }

			

		}		

		echo json_encode($ret_arr);

	 }



      function verify($verificationText=NULL){

		$this->load->model('usermodel');

		//if($this->usermodel->checkIsverified($verificationText)){

			$noRecords = $this->usermodel->verifyEmailAddress($verificationText);  

			if ($noRecords > 0){

			 $error = array( 'success' => "Email Verified Successfully! Now you can login . ");

			 //send a mail here

			 /* $sub="Registration Successfull.";	

			  $msg="Your mail is verified successfully.";

			  $from="admin@admin.com";

			  $from_msg="Admin Team";

			  $this->sendEmail($email,$sub,$msg,$from,$from_msg);*/

			}else{

			 $error = array( 'error' => "Sorry Unable to Verify Your Email!"); 

			}

		/*}else{

			$error = array( 'success' => "Yuor Email already Verified Successfully!");

		}*/

		$data['errormsg'] = $error; 

		$this->load->view('home/header',$data);

		$this->load->view('home/verify', $data);   

		$this->load->view('home/footer',$data);

	  }





	public function welcome()
	{
		/*if($this->session->userdata('language')=='english')
		$data['postfix']='';
		else
		$data['postfix']='_ar';	*/

		$user_id = $this->session->userdata('userId');
		if(!empty($user_id)){
			$data['title']= 'Welcome';
			$data['username'] = $this->session->userdata('username');
			$data['usertype'] = $this->session->userdata('usertype');

			if($data['usertype'] == 1) {
				$this->load->model('usermodel','user');
				$data['bookings']=$this->user->get_bookings($this->session->userdata('userId'));
			} else {
				$this->load->model('agentmodel','agent');
				$data['bookings']=$this->agent->get_bookings($this->session->userdata('userId'));
			}

			// echo $user_id.'-------<pre>'; print_r($data);exit;
			$this->load->view('home/inner_header',$data);
			$this->load->view('home/welcome', $data);
			$this->load->view('home/footer',$data);
		} else {
			redirect('/landing');
		}

	/* if(($this->session->userdata('username')!="")){

	$data['title']= 'Welcome';

	//  $this->load->view('home/header_view',$data);

	$this->load->view('home/welcome', $data);

	//$this->load->view('home/footer_view',$data);

	}else{

	redirect("home/index");

	}

	//  http://www.technicalkeeda.com/php-codeigniter/verify-email-address-using-php-codeigniter*/

	}



	 public function check_email()

	{

     $this->load->model('usermodel');

	 $email_address=$this->input->post('email_address');

	 $result=$this->usermodel->check_email_exist($email_address);

	 if($result==0)

	 {

	 	  echo "true";

	 

	  }

	 else{

          echo "false";

	  }

	}

	

	

	/*public function forgotpassword()

	{

		if (isset($_GET['info'])) {

               $data['info'] = $_GET['info'];

              }

		if (isset($_GET['error'])) {

              $data['error'] = $_GET['error'];

              }

        $this->load->view('home/header',$data);

		$this->load->view('forgot_password',$data);

		$this->load->view('home/footer',$data);

	}*/

	

	

	

	public function forgotpassword()

	{

		//$this->load->helper('url');

		$data['title']="Reset Password";

		$this->load->model('usermodel');

		if( $this->input->post('email')!=""){

			$email=$this->input->post('email');

			$result=$this->usermodel->check_email_exist($email);

			if($result){

			    $this->load->helper('string');

  				$password= random_string('alnum', 16);

				if($this->usermodel->resetuserpassword($email,$password)){				

				 //send a mail here

				  $sub="Password reset Successfull.";	

				  $msg="You have requested the new password, Here is you new password: ". $password;

				  $from="admin@admin.com";

				  $from_msg="Admin Team";

				  $this->sendEmail($email,$sub,$msg,$from,$from_msg);

				  echo 1;	

				}else{

				  echo 0;

				}			

			}else{

				echo 2;

			}

		}else{

			$this->load->view('home/header',$data);

			$this->load->view('home/forgot_password',$data);

			$this->load->view('home/footer',$data);	

		}

		/*$q = $this->db->query("select * from users where email='" . $email . "'");

        if ($q->num_rows > 0) {

            $r = $q->result();

            $user=$r[0];

			$this->resetpassword($user);

			$info= "Password has been reset and has been sent to email id: ". $email;

			redirect('/index.php/login/forget?info=' . $info, 'refresh');

        }

		$error= "The email id you entered not found on our database ";

		redirect('/index.php/login/forget?error=' . $error, 'refresh');*/

		

	} 

	

	public function sendEmail($toemail,$sub='',$msg='',$from='',$from_msg=''){

	

	

				 $config = Array(

					'protocol' => 'smtp',

					//'smtp_host' => 'smtp.yourdomain.com.',

					//'smtp_port' => 465,

					//'smtp_user' => 'admin@yourdomain.com', // change it to yours

					//'smtp_pass' => '########', // change it to yours

					'mailtype' => 'html',

					'charset' => 'iso-8859-1',

					'wordwrap' => TRUE

				 );

				 



				 $this->load->library('email', $config);

				 $this->email->set_newline("\r\n");

				 $this->email->from($from, $from_msg);

				 $this->email->to($toemail);  

				 $this->email->subject($sub);

				 $this->email->message($msg);

				 $this->email->send();	

		}			 

					

	public function logout() {
		$old_lang = $this->session->userdata('language');
		$newdata = array(
			'username'   =>'',
			'userId'  =>'',
			'usertype'  =>'',
		);
		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		$this->session->set_userdata('language',$old_lang);
		redirect("index.php/landing/index");
	}

	

	public function changepass(){



		if(($this->session->userdata('username')!="")){

			$data['title']="Change Password";

			$this->load->model('usermodel');

			if( $this->input->post('newpassword')!=""){

				$newpassword = $this->input->post('newpassword');

				$oldpassword = $this->input->post('oldpassword');

				//echo $newpassword ;

				//echo $oldpassword;

				//die();

				if($newpassword && $oldpassword){

					$result = $this->usermodel->changePassword($newpassword,$oldpassword);

					//echo $result;

				    $ret_arr=array('result'=>$result);

				    echo json_encode($ret_arr);		

					exit();		

				}

			}else{

		    $data['username'] = $this->session->userdata('username');

			$data['usertype'] = $this->session->userdata('usertype');

			$this->load->view('home/inner_header',$data);

			$this->load->view('home/changepass',$data);

			$this->load->view('home/footer',$data);

			}

		}else{

			$this->index();

		}

		

	}

	

	public function thankyou()

	{

	 $data['title']= 'Thank';

	 if($this->session->userdata('language')=='english')

				$data['postfix']='';

			else

				$data['postfix']='_ar';	

	 $this->load->view('home/header',$data);

	 $this->load->view('home/thankyou', $data);

	 $this->load->view('home/footer',$data);

	}

	

	

	public function my_account($updmsg = '')

	{

		if(($this->session->userdata('username')!=""))

		{

			$data['title']="Update Account";

			$this->load->model('usermodel');

			if( $this->input->post('update'))

			{

				$udata['FirstName'] = $this->input->post('first_name');

				$udata['LastName'] = $this->input->post('last_name');

				$udata['userName'] = $this->input->post('username');

				$udata['Mobile'] = $this->input->post('phone');

				$udata['Address'] = $this->input->post('address');

				//$udata['City'] = $this->input->post('city');

				// $udata['country'] = $this->input->post('country');

				$udata['Gender'] = $this->input->post('gender');

				//$udata['Zipcode'] = $this->input->post('city');

				//$udata['description'] = $this->input->post('description');

				// $udata['BirthDate'] = $this->input->post('dob');

				// $udata['dDateModify'] = date("Y:m:d H:i:s");

				// echo '<pre>';print_r($udata);exit;

				if($this->usermodel->update_user($udata))

				{

					// redirect("index.php/landing/my_account/updsuccess");

					echo 1;

				}

				else

				{

					// redirect("index.php/landing/my_account/upderror");

					echo 2;

				}

			}

			else

			{

				if($updmsg=="upderror")

				{

					$data['upd_error'] ="Sorry update not successfull";

				}

				else if($updmsg=="updsuccess")

				{

					$data['upd_success'] ="Update successfull";

				}

				$data['userInfo'] = $this->usermodel->fetchUserInfo($this->session->userdata('userId'));

				$data['username'] = $this->session->userdata('username');

				$data['usertype'] = $this->session->userdata('usertype');

				$this->load->model('country');

				$data['country_list'] = $this->country->get_country();

				//$data['zipstatecity_list'] = $this->country->get_statecityzip();

				$this->load->view('home/inner_header',$data);

				$this->load->view('home/my_account',$data);

				$this->load->view('home/footer',$data);

			}

		}

		else

		{

			$this->index();

		}

	}

	

	function get_country_by_abv(){

		if($this->session->userdata('language')=='english')

				$data['postfix']='';

			else

				$data['postfix']='_ar';	

		$keyword=$this->input->post('keyword');

		$this->load->model('country','country');

		$result=$this->country->get_country_by_abv($keyword);

		

		if(!empty($result)) {

		?>

		<ul id="country-list">

		<?php

		foreach($result as $country) {

		?>

		<li onClick="selectCountry('<?php echo $country["country"]; ?>',<?php echo $country['id'];?> );"><?php echo $country["country"]; ?></li>

		<?php } ?>

		</ul>

		<?php }  

	}

	

	function set_session_lang()

	{

		$lang = $this->input->post('language');

		if(isset($lang) && !empty($lang))

		{

			if(trim($lang) == 'en')

			{

				$this->session->set_userdata('language','english');

				$this->lang->load('landing', 'english');

			}

			if(trim($lang) == 'ar')

			{

				$this->session->set_userdata('language','arabic');	

				$this->lang->load('landing', 'arabic');

			}

			echo 1;

		}

	}

	function pkg_details()
	{
		$bookingId = $this->input->get('pkg_id');
		$user_id = $this->session->userdata('userId');
		if(!empty($user_id)){
			$data['username'] = $this->session->userdata('username');
			$data['usertype'] = $this->session->userdata('usertype');
			$this->load->model('agentmodel','agent');
			$bookings = $this->agent->get_booking_details($bookingId);
			$data['bookings'] = $bookings[0];
			$this->load->view('home/inner_header',$data);
			$this->load->view('home/booking_details', $data);
			$this->load->view('home/footer',$data);
		} else {
			redirect('/landing');
		}

	}


	

	

}



