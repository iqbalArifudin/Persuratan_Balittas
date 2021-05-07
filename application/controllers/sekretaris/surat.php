<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class surat extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('admin/surat/surat_model');
            $this->load->model('admin/user/user_model');
            // $this->load->helper(array('url','download'));
        }
        
        public function index()
        {
        //    $this->admin_model->index();
        $data['surat'] = $this->surat_model->tampilSurat();
        $data['user'] = $this->user_model->getUser($this->session->userdata('id_user'));
        $this->load->view('templatesekretaris/header_sekretaris',$data);
        $this->load->view('templatesekretaris/sidebar_sekretaris',$data);
        $this->load->view('templatesekretaris/topbar_sekretaris',$data); 
        $this->load->view('sekretaris/kelola_surat/indextambah',$data);
        $this->load->view('templatesekretaris/footer_sekretaris',$data);  
        
        }	

        public function hapus($id_surat)
        {
            if($this->surat_model->hapusDataSurat($id_surat) == false)
            {
                $this->session->set_flashdata('flashdata', 'gagal');
                $this->session->set_flashdata('pesan2','Gagal Di hapus, Karena Data User di pakai');
                redirect('sekretaris/surat');
            }else{
                $this->load->library('session');
                $this->session->set_flashdata('flashdata', 'dihapus');
                $this->session->set_flashdata('pesan2','Data Berhasil Di hapus');
                redirect('sekretaris/surat','refresh');
            } 
        }
        
        public function editsurat($id_surat){
            $this->load->library('form_validation');
            $data ['surat'] = $this->surat_model->getSurat($id_surat);
            $data['user'] = $this->user_model->getUser($this->session->userdata('id_user'));
            $this->form_validation->set_rules('tgl_diterima', 'tgl_diterima', 'required');
            // $this->form_validation->set_rules('status', 'status', 'required');

            if($this->form_validation->run() == FALSE){
                $this->load->view('templatesekretaris/header_sekretaris',$data);
                $this->load->view('templatesekretaris/sidebar_sekretaris',$data);
                $this->load->view('templatesekretaris/topbar_sekretaris',$data); 
                $this->load->view('sekretaris/kelola_surat/edit' ,$data);
                $this->load->view('templatesekretaris/footer_sekretaris',$data); 
            }
            else{
                    $this->surat_model->ubahSurat($id_surat);
                    $this->session->set_flashdata('pesan3','Data Berhasil Di edit');
                    $this->load->library('session');
                    redirect('sekretaris/surat','refresh');
            }
        }

        public function download($id_surat){
            $this->load->helper('download');
            $fileinfo = $this->surat_model->download($id_surat);
            $file = './assets/filesurat/'.$fileinfo['file_surat'];
            force_download($file, NULL);
        }

        public function download_lampiran($id_surat){
            $this->load->helper('download');
            $fileinfo = $this->surat_model->download($id_surat);
            $file = './assets/filesurat/'.$fileinfo['lampiran'];
            force_download($file, NULL);
        }
    }
        /* End of fils admin.php */
    

?>