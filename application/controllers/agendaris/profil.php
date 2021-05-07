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
        $this->load->view('templateagendaris/header',$data);
        $this->load->view('templateagendaris/sidebar',$data);
        $this->load->view('templateagendaris/topbar',$data); 
        $this->load->view('agendaris/home/profile', $data);
        $this->load->view('templateagendaris/footer',$data);  
        }
    
        public function profil($id_user){
            $data['title']='Detail User';
            $data['user']=$this->user_model->getDetailUser($id_user);
            $this->load->view('templateagendaris/header',$data);
            $this->load->view('templateagendaris/sidebar');
            $this->load->view('templateagendaris/topbar'); 
            $this->load->view('agendaris/home/profile' ,$data);
            $this->load->view('templateagendaris/footer'); 
        }
        
    }
        /* End of fils admin.php */
?>