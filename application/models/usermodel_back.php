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
  $data=array(
    'userName'=>$this->input->post('user_name'),
    'EmailAddress'=>$this->input->post('email_address'),
    'password'=>md5($this->input->post('password')) ,
	'userType'=>$this->input->post('user_type') ,
	//'orgPassword'=>$this->input->post('password') ,
    'usercode'=> $usercode,
    'confirm_code'=> $activation
  );
  if($this->db->insert('userinfo',$data)){
	  return 1;
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
  /*if($query->num_rows()>0)
 {
  return true;
 }
 else
 {
  return false;
 }*/
}
public function resetuserpassword($email_address,$password){
  //date_default_timezone_set('GMT');
  $this->db->where("EmailAddress",$email_address);
  if($this->db->update('userinfo',array('password'=>MD5($password)))){
      return 1;
  }else{
 	 return 0;
  }
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

}
?>
