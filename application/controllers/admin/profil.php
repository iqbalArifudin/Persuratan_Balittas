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
        $this->load->view('template/header_admin',$data);
        $this->load->view('template/sidebar_admin',$data);
        $this->load->view('template/topbar_admin',$data); 
        $this->load->view('admin/home/profile', $data);
        $this->load->view('template/footer_admin',$data);  
        }
    
        public function profil($id_user){
            $data['title']='Detail User';
            $data['user']=$this->user_model->getDetailUser($id_user);
            $this->load->view('template/header_admin',$data);
            $this->load->view('template/sidebar_admin');
            $this->load->view('template/topbar_admin'); 
            $this->load->view('admin/home/profile' ,$data);
            $this->load->view('template/footer_admin'); 
        } 
    }
        /* End of fils admin.php */
?>