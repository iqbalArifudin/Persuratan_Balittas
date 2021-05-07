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
        //    $this->agendaris_model->index();
            $data['title'] = 'Halaman agendaris';
            $data['user'] = $this->user_model->getUser($this->session->userdata('id_user'));
           $this->load->view('templateagendaris/header',$data);
           $this->load->view('templateagendaris/sidebar',$data);
           $this->load->view('templateagendaris/topbar',$data); 
           $this->load->view('agendaris/home/index', $data);
           $this->load->view('templateagendaris/footer',$data);   
        }
    }
        /* End of fils agendaris.php */
    

?>