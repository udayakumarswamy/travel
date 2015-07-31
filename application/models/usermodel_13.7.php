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
  
  $this->db->select('userId,userName');
  $this->db->from('userinfo');
  $this->db->where("EmailAddress",$email);
  
  $query=$this->db->get();
  if($query->num_rows()>0)
  {
	$row=$query->row();  
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
		return 1;
	}
	else{
		return 0;
	}
  }else{
	 return 0;  
  }
  
  
 }
 // echo $query->num_rows();
  
   
 
 public function add_user($activation)
 {
  // Create a unique  activation code:


  $data=array(
    'userName'=>$this->input->post('user_name'),
    'EmailAddress'=>$this->input->post('email_address'),
    'password'=>md5($this->input->post('password')) ,
	'userType'=>$this->input->post('user_type') ,
	//'orgPassword'=>$this->input->post('password') ,
    'confirm_code'=> $activation,
	'DateCreated' => date("Y:m:d H:i:s")
  );
  if($this->db->insert('userinfo',$data)){
   
	  return 1;
  }else{
 	 return 0;
  }
 }
 
 public function verifyEmailAddress($verificationcode){
    $sql = "update userinfo set eStatus='Active',confirm_code='' WHERE confirm_code=?";
    $this->db->query($sql, array($verificationcode));
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
  $this->db->where("EmailAddress",$email_address);
  if($this->db->update('userinfo',array('password'=>MD5($password)))){     
	  return 1;
  }else{
 	 return 0;
  }
}

/******************13.7.************************/
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

}
?>
