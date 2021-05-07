<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class home extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('admin/surat/surat_model');
            $this->load->model('admin/user/user_model');
        }
        
        public function index()
        {
        //    $this->konsep_model->index();
            $data['title'] = 'Halaman konsep';
            $data['user'] = $this->user_model->getUser($this->session->userdata('id_user'));
           $this->load->view('templatekonsep/header_konsep',$data);
           $this->load->view('templatekonsep/sidebar_konsep',$data);
           $this->load->view('templatekonsep/topbar_konsep',$data); 
           $this->load->view('konsepsurat/home/index', $data);
           $this->load->view('templatekonsep/footer_konsep',$data);   
        }
    }
        /* End of fils konsep.php */
    

?>