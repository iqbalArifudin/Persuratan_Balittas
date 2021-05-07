<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class profil extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('admin/user/user_model');  
        }
        
        public function index()
        {
        //    $this->admin_model->index();s
        $data['user'] = $this->user_model->getUser($this->session->userdata('id_user'));
        $data['users'] = $this->user_model->tampilSemuaUser();
        // $data['users'] = $this->db->get('user')->result();
        $this->load->view('templatekonsep/header_konsep',$data);
        $this->load->view('templatekonsep/sidebar_konsep',$data);
        $this->load->view('templatekonsep/topbar_konsep',$data); 
        $this->load->view('konsepsurat/home/profile', $data);
        $this->load->view('templatekonsep/footer_konsep',$data);  
        }
    
        public function profil($id_user){
            $data['title']='Detail User';
            $data['user']=$this->user_model->getDetailUser($id_user);
            $this->load->view('templatekonsep/header_konsep',$data);
            $this->load->view('templatekonsep/sidebar_konsep');
            $this->load->view('templatekonsep/topbar_konsep'); 
            $this->load->view('konsepsurat/home/profile' ,$data);
            $this->load->view('templatekonsep/footer_konsep'); 
        } 
    }
        /* End of fils admin.php */
?>