<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Termsconditions extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -  
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */

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

    public function index()
    {
        //$this->load->view('home/index');
        $data['title']= 'About us';
        $this->load->model('cmsmodel','cms');
        /*if($this->session->userdata('language')=='english')
        $data['postfix']='';
        else
        $data['postfix']='_ar'; */
        $data['cms']=$this->cms->get_content(4);

        if($this->session->userdata('language')=='english')
        {
            $data['title'] = $data['cms']['cms_page_name'];
            $data['content'] = $data['cms']['cms_page_content'];
        }

        if($this->session->userdata('language')=='arabic')
        {
            $data['title'] = $data['cms']['cms_page_name_ar'];
            $data['content'] = $data['cms']['cms_page_content_ar'];
        }
        $this->load->view('home/header',$data);
        $this->load->view("home/termsconditions", $data);
        $this->load->view('home/footer',$data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */