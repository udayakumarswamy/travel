<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

function isAdminLoggedIn()
{
	
	$CI =& get_instance();
	$CI->load->library("session");
	$admin_id = $CI->session->userdata('admin_id');
	if($admin_id == '')
	{
		return false;
	}
	else
	{
		return true;	
	}
}

function isMemberLoggedIn()
{
	$CI =& get_instance();
	$member_id = $CI->session->userdata('member_id');
	if($member_id == '')
	{
		return false;
	}
	else
	{
		return true;	
	}
}
################################# user type checking function ##############################################
function user_type()
{
        $CI =& get_instance();
	$user_type_logged = $CI->session->userdata('user_type');
        if(empty($user_type_logged) || !isset($user_type_logged)){$user_type_logged=0;}
        return $user_type_logged;
	
}
function is_guest()
{
    $CI =& get_instance(); 
    $member_id = $CI->session->userdata('user_id');
    if(empty($member_id) || !isset($member_id)){$member_id=0;}
    $query="SELECT * FROM `prayer_users` where user_id=$member_id and user_type='Guest' and user_email <>'' and user_confirmed = 'Y' and user_active = 'Y'";
    $query = $CI->db->query($query);
    $rowcount = $query->num_rows();
    if ($rowcount > 0) {
        return true;
    } else {
        return false;
    }
}
function is_general()
{
    $CI =& get_instance(); 
    $member_id = $CI->session->userdata('user_id');
    if(empty($member_id) || !isset($member_id)){$member_id=0;}
    $query="SELECT * FROM `prayer_users` where user_id=$member_id and user_type='General' and user_email <>''";
    $query = $CI->db->query($query);
    $rowcount = $query->num_rows();
    if ($rowcount > 0) {
        return true;
    } else {
        return false;
    }
}
function is_visitor()
{
    $CI =& get_instance(); 
    $member_id = $CI->session->userdata('user_id');
    if(empty($member_id) || !isset($member_id)){$member_id=0;}
    $query="SELECT * FROM `prayer_users` where user_id=$member_id and user_type='Guest' and user_confirmed = 'N'";
    $query = $CI->db->query($query);
    $rowcount = $query->num_rows();
    if ($rowcount > 0) {
        return true;
    } else {
        return false;
    }  
}
############################################################################################################



################################# Guest Id creation ########################################################
function get_guest_id()
{
        $validCharacters="";
        $length = 3;
        $validCharacters = "12345678901";

        $validCharNumber = strlen($validCharacters);
        $result = time();
         for ($i = 0; $i < $length; $i++) {

          $index = mt_rand(0, $validCharNumber - 1);

          $result .= $validCharacters[$index];

         }

       

    return $result; 

}
############################################################################################################
function is_group_owner($md5_group_id, $user_id) {
    $CI = & get_instance();
    $query = $CI->db->get_where('groups', array('md5(group_id)' => $md5_group_id, 'user_id' => $user_id));
    $rowcount = $query->num_rows();
    if ($rowcount > 0) {
        return true;
    } else {
        return false;
    }
}
function get_group_approval_status($md5_group_id) {
    $CI = & get_instance();
    $query = $CI->db->get_where('groups', array('md5(group_id)' => $md5_group_id));
    if ($query->num_rows() > 0) {
        $row = $query->row_array();


        if ($row['approval_require'] == 'Y') {
            return true;
        } else {
            return false;
        }
    }
}

/********************************** for message display ********************************/
 function show_msg(){
      $CI =& get_instance();
     if($CI->session->userdata('success_msg')) { 
         
    echo '<div id="success" class="info_div" style="margin-left:8px;margin-right:8px;margin-bottom:5px;">
    <span class="ico_success">'. $CI->session->userdata('success_msg').'</span> </div>';

    $CI->session->unset_userdata('success_msg');
    } 
    
 }
/********************************** for message display End********************************/
 
/******************************** Show User name*******************************************/
function get_user_name($user_id)
 {
     $CI =& get_instance();
     $array=array('user_id'=>$user_id);
     $query=$CI->db->get_where('prayer_users',$array);
     $total=$query->num_rows();
     if($total>0)
     {
        $data=$query->row_array(); 
        $name=$data['user_fname'].' '.$data['user_lname'];
        $name= ucwords(trim(strtolower($name)));
     }
     else
     {
       $name='Not Found';
     }
     return $name;
 }

 /********************************End Show User name*******************************************/
 
 /******************************** Request category show **************************************/
 
  function get_request_type($category_id)
 {
     $CI =& get_instance();
     $array=array('prayer_category_id'=>$category_id);
     $query=$CI->db->get_where('prayer_request_category',$array);
     $total=$query->num_rows();
     if($total>0)
     {
        $data=$query->row_array(); 
        $name=$data['prayer_category_name'];
        $name= ucwords(trim(strtolower($name)));
     }
     else
     {
       $name='Not Found';
     }
     return $name;
 }
 /******************************************Code End ************************************************/
 function get_request_send_to($id)
 {
     
     if(!empty($id)){
     $id=$id-1;
     $send_to=array('Family','Friends','To specific group(s)','To specific church(s)','Private (to particular member)','Random Members','All');
     $value=$send_to[$id];
     }else{
         $value="Not Found";
     }
     return $value;
 }
 
 ###################################### function to check visted page ###############################
 function is_active_url($controler_segment,$page_segment,$controler_str,$page_str)
 {
      $CI =& get_instance();
      $CI->load->helper('auth');
      $controler=$CI->uri->segment($controler_segment);
      $page=$CI->uri->segment($page_segment);
      if($controler==$controler_str && $page==$page_str){
         return true; 
      }else{
          return false;
      }
 }
 ####################################################################################################
 
 ################################ count profile share item by update id from update table ###########
 function count_prifle_share_by_update_id($update_id)
 {
     $CI =& get_instance();
     $array=array('update_id'=>$update_id);
     $query=$CI->db->get_where('prayer_shared_items',$array);
     $total=$query->num_rows();
     return $total;
 }
 ####################################################################################################

?>