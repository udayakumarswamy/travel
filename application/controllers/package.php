<?php class Package extends CI_Controller{

        function __construct(){

            parent::__construct();
            $us_data = $this->session->userdata('language');
            if( !empty($us_data))
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

        function package_details($package_id){
            /*if($this->session->userdata('language')=='english')
                $data['postfix']='';
            else
                $data['postfix']='_ar'; */
            $this->load->model('packagemodel','package');
            $data['package']=$this->package->get_package_details($package_id);
            $data['package_images']=$this->package->get_package_image_details($package_id);
            $data['amenities'] = $this->list_amenities();

            $this->load->model('packagemodel','package');
            // echo '<pre>'; print_r($data);exit;
            $this->load->view('home/header',$data);
            $this->load->view("property/property_details.php", $data);
            $this->load->view('home/footer',$data);
        }
        
        function search_package(){
            if($this->session->userdata('language')=='english')
                $data['postfix']='';
            else
                $data['postfix']='_ar'; 

            $package_country=$this->input->get('country');
            $package_arrival_date=$this->input->get('arrival');
            $package_dept_date=$this->input->get('departure');
            $adult=$this->input->get('adults');
            $children=$this->input->get('children');
            
            if($package_dept_date != '') {
                $dept_date = date('Y-m-d', strtotime($package_dept_date));
            }
            else {
                $dept_date = date('Y-m-d');
            }

            if($package_arrival_date != '') {
                $arr_date = date('Y-m-d', strtotime($package_arrival_date));
            }
            else {
                $arr_date = date('Y-m-d', strtotime('+2 week'));
            }

            
            $this->load->model('packagemodel','package');
            $this->load->model('country','country');
            $data['countries'] = $this->country->get_country_ids();
            // $data['total_rows']=$this->package->get_search_total_result($package_country_name,$package_country,$dept_date,$arr_date,$adult,$children);
            $data['package']=$this->package->get_search_result($package_country,$dept_date,$arr_date,$adult,$children);
            $data['total_rows'] = count($data['package']);
            $data['package_country']=$package_country;
            $data['arr_date']=$arr_date;
            $data['dept_date']=$dept_date;
            $data['adult']=$adult;
            $data['children']=$children;
            $data['amenities']=$this->package->get_amanities();
            $this->load->view('home/header',$data);
            $this->load->view('property/package_listing',$data);
            $this->load->view('home/footer');
            
        }
        
        function search_package_ajax(){
            if($this->session->userdata('language')=='english')
                $data['postfix']='';
            else
                $data['postfix']='_ar'; 
            
            $country_id=$this->input->post('country_id');
            $country_name=$this->input->post('country_name');
            $arr_date = $this->input->post('arr_date');
            $dept_date = $this->input->post('dept_date');
            
            if($dept_date != '') {
                $dept_date = date('Y-m-d', strtotime($dept_date));
            }

            if($arr_date != '') {
                $arr_date = date('Y-m-d', strtotime($arr_date));
            }

            $adults=$this->input->post('adults');
            if(isset($adults) && !empty($adults)){
                $adults = $adults;
            }else{
                $adults = '';
            }
            $children=$this->input->post('children');
            if(isset($children) && !empty($children)){
                $children = $children;
            }else{
                $children = '';
            }
            if($this->input->post('sort'))
                $sort=$this->input->post('sort');
            else
                $sort='';   
            if($this->input->post('sort_type')) 
                $sort_type=$this->input->post('sort_type');
            else
                $sort_type='';
            if($this->input->post('filter'))
                $filter=$this->input->post('filter');
            else
                $filter=''; 
            
            $this->load->model('packagemodel','package');
            $data['filter']=$filter;
                                                            
            $data['package']=$this->package->get_search_result($country_id,$dept_date,$arr_date,$adults,$children,$sort_type,$sort);
            $data['total_rows'] = count($data['package']);
            if($sort_type=='' || $sort_type=='alpha')
                $this->load->view('property/list_package',$data);
            else
                $this->load->view('property/list_package_price',$data); 
            
        
        }
        
        function book_my_package($package_id='',$country_id='',$arr_date='',$dept_date='',$adults='',$children=''){
            if($this->session->userdata('language')=='english')
                $data['postfix']='';
            else
                $data['postfix']='_ar'; 

            $this->load->model('packagemodel','package');
            $this->load->model('country','country');
            $data['package']=$this->package->get_package_details($package_id);
            $data['country']=$this->country->get_country_by_id($country_id);
            $data['adults']=$adults;
            $data['children']=$children;
            //echo'<pre>'; print_r($data); exit;
            $this->load->view('home/header',$data);
            $this->load->view('property/booking_form',$data);
            $this->load->view('home/footer');
            
        }
        
        function checkout(){
            if($this->session->userdata('language')=='english')
                $data['postfix']='';
            else
                $data['postfix']='_ar'; 

            $adults = $this->input->post('adults');
            $children = $this->input->post('children');
            $infant = $this->input->post('infant');
            if(is_numeric($adults)){
                $adults = $this->input->post('adults');
            }else{
                $adults = 0;
            }
            if(is_numeric($children)){
                $children = $this->input->post('children');
            } else {
                $children = 0;
            }
            if(is_numeric($infant)){
                $infant = $this->input->post('$infant');
            } else {
                $infant = 0;
            }

            $data['package_id']=$this->input->post('package_id');
            $data['adults']= $this->input->post('adults');
            $data['children']=$this->input->post('children');
            $data['infant']=$this->input->post('infant');
            $data['package_cost']=$this->input->post('cost_hidden');
            $array_package_data=$data;
            $this->session->set_userdata($array_package_data);
            if(!$this->session->userdata('userId')){
                $this->load->view('home/header',$data);
                $this->load->view('property/checkout',$data);
                $this->load->view('home/footer');
            }else{
                redirect('index.php/package/intermediate_booking');
            }                               
        }

        /*function confirmation(){
            $data['package_id']=$this->input->post('package_id');
            $data['adults']=$this->input->post('adults');
            $data['children']=$this->input->post('children');
            $data['infant']=$this->input->post('infant');
            $data['package_cost']=$this->input->post('cost_hidden');
            $this->load->model('packagemodel','package');
            $package_details = $this->package->get_package_details($data['package_id']);
            $data['pkg_details'] =  $package_details;
            // echo '<pre>'; print_r($this->session->userdata);exit;
            $this->load->view('home/header',$data);
            $this->load->view('property/confirmation',$data);
            $this->load->view('home/footer');
        }*/
        
        function booking_success(){
           /*if($this->session->userdata('language')=='english')
                $data['postfix']='';
            else
                $data['postfix']='_ar'; 
            if($this->session->userdata('language')=='english')
                $data['postfix']='';
            else
                $data['postfix']='_ar'; */
            $package_id=$this->input->post('package_id');
            $adults=$this->input->post('adults');
            $children=$this->input->post('children');
            $infant=$this->input->post('infant');
            $user_id=$this->input->post('user_id');
            $package_cost=$this->input->post('package_cost');
            
            if($adults=='Adults')
                $adults=0;
            if($children=='Children')
                $children=0;
            if($infant=='Infant')
                $infant=0;      
            
            $this->load->model('packagemodel','package');
            $booking_id = $this->package->book_package($package_id,$adults,$children,$infant,$user_id,$package_cost);
            /**/
            $this->load->model('agentmodel','agent');
            $bookings = $this->agent->get_booking_details($booking_id);
            $data['bookings'] = $bookings[0];
            /**/
            $this->load->view('home/header',$data);
            $this->load->view('property/booking_success',$data);
            $this->load->view('home/footer',$data);
        }

        function booking_faliure(){
           if($this->session->userdata('language')=='english')
                $data['postfix']='';
            else
                $data['postfix']='_ar'; 
            if($this->session->userdata('language')=='english')
                $data['postfix']='';
            else
                $data['postfix']='_ar'; 
            $this->load->view('home/header',$data);
            $this->load->view('property/booking_failure');
            $this->load->view('home/footer');
        }

        function intermediate_booking($user_id=0){
            if($user_id!=0)
                $data['user_id']=$user_id;
            else
                $data['user_id']=$this->session->userdata('userId');
                    
            if($this->session->userdata('language')=='english')
                $data['postfix']='';
            else
                $data['postfix']='_ar'; 
             $this->load->model('packagemodel','package');
            $package_details = $this->package->get_package_details($this->session->userdata("package_id"));
            $data['package'] =  $package_details;
            $this->load->view('home/header',$data);
            $this->load->view('property/intermediate_booking',$data);
            $this->load->view('home/footer');
        }
        
        function calculate_cost(){
            $this->load->model('packagemodel','package');
            $package_id=$this->input->post('package_id');
            $adult=$this->input->post('adult');
            $child=$this->input->post('child');
            $infant=$this->input->post('infant');
            $booked_details = $this->check_package_avialability($package_id);
            $package_details = $this->package->get_package_details($package_id);
            $adult_remaining = intval($package_details['number_of_seats_adult'] - $booked_details['adults']);
            $child_remaining = intval($package_details['number_of_seats_child'] - $booked_details['children']);
            $infant_remaining = intval($package_details['number_of_seats_infant'] - $booked_details['infant']);
            $result=array();
            $ad_status = 1;
            $ch_status = 1;
            $inf_status = 1;

            if(intval($adult) > $adult_remaining)
            {
                $ad_status = 0;
                $result['error_msg'] = $this->lang->line('only').' '.$adult_remaining.' '.$this->lang->line('adults').' '.$this->lang->line('seats').' '.$this->lang->line('available');
                // exit;
            }
            if(intval($child) > $child_remaining)
            {
                $ch_status = 0;
                $result['error_msg'] = $this->lang->line('only').' '.$child_remaining.' '.$this->lang->line('child').' '.$this->lang->line('seats').' '.$this->lang->line('available');
            }if(intval($infant) > $infant_remaining)
            {
                $inf_status = 0;
                $result['error_msg'] = $this->lang->line('only').' '.$infant_remaining.' '.$this->lang->line('infant').' '.$this->lang->line('seats').' '.$this->lang->line('available');
            }

            if(!empty($ad_status) && !empty($ch_status) && !empty($inf_status)) {
                $total_cost=($adult*$package_details['package_cost_adult'])+($child*$package_details['package_cost_child'])+($infant*$package_details['package_cost_infant']);
                $total_cost= intval($total_cost);
                $result=array('result'=>$total_cost);
            }
            echo json_encode($result);
        }

    function list_amenities(){
        $this->load->model('packagemodel','package');
        $amenities = $this->package->list_amenities_display();
        return $amenities;
    }           

    // pkg_id -- package_id
    function check_package_avialability($package_id)
    {
        $pre_bookig_details = $this->package->get_package_booking_details($package_id);
        $no_of_adults = 0;
        $no_of_childs = 0;
        $no_of_infants = 0;
        if(count($pre_bookig_details) > 0) {
            foreach ($pre_bookig_details as  $val) {
                if(!empty($val['booking_code'])) {
                    $no_of_adults = intval($no_of_adults + $val['adults']);
                    $no_of_childs = intval($no_of_childs + $val['children']);
                    $no_of_infants = intval($no_of_infants + $val['infant']);
                }
            }
        }
        $data = array();
        $data['adults'] = $no_of_adults;
        $data['children'] = $no_of_childs;
        $data['infant'] = $no_of_infants;
        return  $data;
    }

}