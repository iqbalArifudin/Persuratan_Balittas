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
        //    $this->sekretaris_model->index();
            $data['user'] = $this->user_model->getUser($this->session->userdata('id_user'));
           $this->load->view('templatesekretaris/header_sekretaris',$data);
           $this->load->view('templatesekretaris/sidebar_sekretaris',$data);
           $this->load->view('templatesekretaris/topbar_sekretaris',$data); 
           $this->load->view('sekretaris/home/index', $data);
           $this->load->view('templatesekretaris/footer_sekretaris',$data);   
        }
    }
        /* End of fils sekretaris.php */
    

?>