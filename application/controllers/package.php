<?php class Package extends CI_Controller{

        function __construct(){

            parent::__construct();
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
            $package_country=$this->input->get('cn_id');
            $package_country_name=$this->input->get('country');
            $package_arrival_date=$this->input->get('arrival');
            $package_dept_date=$this->input->get('departure');
            $adult=$this->input->get('adults');
            $children=$this->input->get('children');
            
            $arr_date_arr=explode('/',$package_arrival_date);
            $arr_date=$arr_date_arr[2].'-'.$arr_date_arr[0].'-'.$arr_date_arr[1];
            $dept_date_arr=explode('/',$package_dept_date);
            $dept_date=$dept_date_arr[2].'-'.$dept_date_arr[0].'-'.$dept_date_arr[1];
            
            $this->load->model('packagemodel','package');
            // $data['total_rows']=$this->package->get_search_total_result($package_country_name,$package_country,$dept_date,$arr_date,$adult,$children);
            $data['package']=$this->package->get_search_result($package_country_name,$package_country,$dept_date,$arr_date,$adult,$children);
            $data['total_rows'] = count($data['package']);
            $data['package_country']=$package_country;
            $data['package_country_name']=$package_country_name;
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
            $arr_date=$this->input->post('arr_date');
            $dept_date=$this->input->post('dept_date');
            $adults=$this->input->post('adults');
            $children=$this->input->post('children');
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
            // $data['total_rows']=$this->package->get_search_total_result($country_name,$country_id,$dept_date,$arr_date,$adults,$children,$sort_type,$sort);
            $data['package']=$this->package->get_search_result($country_name,$country_id,$dept_date,$arr_date,$adults,$children,$sort_type,$sort);
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
            $this->load->view('home/header',$data);
            $this->load->view('property/booking_form',$data);
            $this->load->view('home/footer');
            
        }
        
        function checkout(){
            if($this->session->userdata('language')=='english')
                $data['postfix']='';
            else
                $data['postfix']='_ar'; 
            $data['package_id']=$this->input->post('package_id');
            $data['adults']=$this->input->post('adults');
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
        
        function booking_success(){
           if($this->session->userdata('language')=='english')
                $data['postfix']='';
            else
                $data['postfix']='_ar'; 
            if($this->session->userdata('language')=='english')
                $data['postfix']='';
            else
                $data['postfix']='_ar'; 
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
            $booking_id=$this->package->book_package($package_id,$adults,$children,$infant,$user_id,$package_cost);
            $this->load->view('home/header',$data);
            $this->load->view('property/booking_success');
            $this->load->view('home/footer');
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
            $package_details=$this->package->get_package_details($package_id);
            
            $total_cost=$adult*$package_details['package_cost_adult']+$child*$package_details['package_cost_child']+$infant*$package_details['package_cost_adult'];
            $result=array('result'=>$total_cost);
            echo json_encode($result);
        }

    function list_amenities(){
        $this->load->model('packagemodel','package');
        $amenities = $this->package->list_amenities_display();
        return $amenities;
    }

}