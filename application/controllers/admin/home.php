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
        //    $this->admin_model->index();
            $data['title'] = 'Halaman Admin';
            $data['user'] = $this->user_model->tampilUser($this->session->userdata('id_user'));
           $this->load->view('template/header_admin',$data);
           $this->load->view('template/sidebar_admin');
           $this->load->view('template/topbar_admin'); 
           $this->load->view('admin/home/index', $data);
           $this->load->view('template/footer_admin');   
        }

        public function chart(){
            
        }

    }
        /* End of fils admin.php */
    

?>