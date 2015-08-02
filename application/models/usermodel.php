<?php
if (! defined('BASEPATH')) exit('No direct script access');

class Usermodel extends CI_Model {
function __construct()
 {
 parent::__construct();
		$this->load->database();
 }
 function login($email,$password)
 {
 
 
  $this->db->select('userId,userName,eStatus,userType,confirm_code');
  $this->db->from('userinfo');
  $this->db->where("EmailAddress",$email);
  //$this->db->where("eStatus","Active");
  
  $query=$this->db->get();
  if($query->num_rows()>0)
  {
	$row=$query->row();  
	$userStatus=$row->eStatus;
	$confirm_code=$row->confirm_code;
	if($userStatus=="Active" && $confirm_code==""){
		$user_id=$row->userId;
		$username=$row->userName;
		$this->db->select('userId');
		$this->db->from('userinfo');
		$this->db->where("password",$password);
		$this->db->where("userId",$user_id);
		$query_pass=$this->db->get();
		if($query_pass->num_rows()>0){
			$this->session->set_userdata('username',$username);
			$this->session->set_userdata('userId',$user_id);
			$this->session->set_userdata('usertype',$row->userType);
			return 1;
		}
		else{
			return 0;
		}
	}else{
		return 2;
	}
  }else{
     
	 return 0;  
  }
  
  
 }
 // echo $query->num_rows();
  
   
 
 public function add_user($activation)
 {
  // Create a unique  activation code:
  if($this->input->post('user_type')==1)
  	$usercode =  "user-".rand(100,99999);
  else
    $usercode =  "agent-".rand(100,9999);
	if($this->input->post('user_type')==1)
	  $user_type=1;
	  else
	  $user_type=2;
  $data=array(
    'userName'=>$this->input->post('user_name'),
    'EmailAddress'=>$this->input->post('email_address'),
    'password'=>md5($this->input->post('password')) ,
	'userType'=>$user_type ,
	//'orgPassword'=>$this->input->post('password') ,
    'usercode'=> $usercode,
    'confirm_code'=> $activation
  );
  if($this->db->insert('userinfo',$data)){
	  return $this->db->insert_id();
  }else{
 	 return 0;
  }
 }
 
 public function checkIsverified($verificationcode){
    $this->db->where("confirm_code",$verificationcode);
    $this->db->where("eStatus",'Inactive');
    $query=$this->db->get("userinfo");
    return $query->num_rows();
 }
 
 public function verifyEmailAddress($verificationcode){

	$this->db->where("confirm_code",$verificationcode);
	$this->db->update('userinfo',array('eStatus'=>'Active','confirm_code'=>""));
    return $this->db->affected_rows(); 
 }
 
 public function check_email_exist($email_address)
{
 $this->db->where("EmailAddress",$email_address);
 $query=$this->db->get("userinfo");
 $num_rows= $query->num_rows();
 
  return $num_rows;

}

public function changePassword($newpassword,$oldpassword){
   $this->db->where("userId", $this->session->userdata('userId'));
   $this->db->where("password", md5($oldpassword));
   $query=$this->db->get("userinfo");
   if( $query->num_rows()){
       $this->db->where("userId", $this->session->userdata('userId'));
       $this->db->where("password", md5($oldpassword));
	   if($this->db->update('userinfo',array('password'=>MD5($newpassword)))){
		return 1;
	   }else{ return 0; }
   }else{
       return 2;
   }
}

public function resetuserpassword($email_address,$password){
  $this->db->where("EmailAddress",$email_address);
  if($this->db->update('userinfo',array('password'=>MD5($password)))){     
	  return 1;
  }else{
 	 return 0;
  }
}


public function update_user($udata){
   $this->db->where('userId',$this->session->userdata('userId'));
   return $this->db->update('userinfo',$udata);  
}

public function fetchUserInfo($userId){
  $this->db->select('*');
  $this->db->from('userinfo');
  $this->db->where("userId",$userId);
  
  $query=$this->db->get();
  if($query->num_rows()>0)
  {
   return $query->row();  
  }
}

function get_bookings($userId){
    $this->db->select('*');
    $this->db->from('package_booking a');
    $this->db->join('package_details b','a.package_id=b.package_id');
    $this->db->join('userinfo c', 'a.booked_by=c.userId');
    $this->db->where('a.booked_by', $userId);
    $this->db->order_by('booking_time','desc');
      
    $result=$this->db->get()->result_array();
    
    return $result;
  }

}
?>
