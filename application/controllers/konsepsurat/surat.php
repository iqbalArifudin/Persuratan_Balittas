<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class surat extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('admin/surat/surat_model');
            $this->load->model('admin/user/user_model');
            $this->load->helper('url');
            $this->load->helper('form');
            // $this->load->helper(array('url','download'));
        }
        
        public function index()
        {
        //    $this->admin_model->index();
        $data['surat'] = $this->surat_model->tampilSuratKonsep($this->session->userdata('id_user'));
        $data['user'] = $this->user_model->getUser($this->session->userdata('id_user'));
        $this->load->view('templatekonsep/header_konsep',$data);
        $this->load->view('templatekonsep/sidebar_konsep',$data);
        $this->load->view('templatekonsep/topbar_konsep',$data); 
        $this->load->view('konsepsurat/kelola_surat/indextambah',$data);
        $this->load->view('templatekonsep/footer_konsep',$data);  
        
        }	

        public function suratKeluar(){
            $data['user'] = $this->user_model->getUser($this->session->userdata('id_user'));
            $data['surat'] = $this->surat_model->tampilSuratKonsep($this->session->userdata('id_user'));
            $this->load->view('templatekonsep/header_konsep',$data);
            $this->load->view('templatekonsep/sidebar_konsep',$data);
            $this->load->view('templatekonsep/topbar_konsep',$data); 
            $this->load->view('konsepsurat/arsip_surat/suratkeluar',$data);
            $this->load->view('templatekonsep/footer_konsep',$data);  
        }

        public function tambahsurat(){
            $data['surat'] = $this->surat_model->tampilSurat();
            $data['user'] = $this->user_model->getUser($this->session->userdata('id_user'));
            $this->load->library('form_validation');
            $this->form_validation->set_rules('perihal', 'perihal', 'required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('templatekonsep/header_konsep',$data);
                $this->load->view('templatekonsep/sidebar_konsep',$data);
                $this->load->view('templatekonsep/topbar_konsep',$data); 
                $this->load->view('konsepsurat/kelola_surat/tambah' ,$data);
                $this->load->view('templatekonsep/footer_konsep',$data);  
            }
            else{
                $upload = $this->surat_model->upload();
                $upload1 = $this->surat_model->upload1();
                // $upload1 = $this->surat_model->upload1();
                if ($upload['result'] == 'success'){
                    $this->surat_model->tambahDataSurat($upload, $upload1);
                    // $this->surat_model->tambahDataLampiran($upload1);
                    $this->session->set_flashdata('pesan','Data Berhasil Di tambah');
                    redirect('konsepsurat/surat','refresh');
                } else {
                    echo $upload['error'];
                }   
                // $this->session->set_flashdata('name', 'value');
            }
        }

        public function editsurat($id_surat)
        {
        $data ['surat'] = $this->surat_model->getSurat($id_surat);
        $data['user'] = $this->user_model->getUser($this->session->userdata('id_user'));
        $this->form_validation->set_rules('dari', 'dari', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templatekonsep/header_konsep',$data);
            $this->load->view('templatekonsep/sidebar_konsep',$data);
            $this->load->view('templatekonsep/topbar_konsep',$data); 
            $this->load->view('konsepsurat/kelola_surat/edit' ,$data);
            $this->load->view('templatekonsep/footer_konsep',$data);
        } else {

            //check jika ada gambar yang akan di upload
            $upload_file = $_FILES['file_surat']['name'];
            if ($upload_file) {
                $config['upload_path'] = './assets/filesurat/';  
                $config['allowed_types'] = 'doc|docx|pdf|png|jpg';  
                $config['max_size']     = '10000';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file_surat')) {
                    $old_file = $data['surat']['file_surat'];
                    if ($old_file != 'default.png') {
                        unlink(FCPATH . './assets/filesurat/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('file_surat', $new_file);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $id_surat = $this->input->post('id_surat');
            $dari = $this->input->post('dari');
            $perihal = $this->input->post('perihal');
            $tgl_masuk = $this->input->post('tgl_masuk');

            $this->db->set('dari', $dari);
            $this->db->set('perihal', $perihal);
            $this->db->set('tgl_masuk', $tgl_masuk);
            $this->db->where('id_surat', $id_surat);
            $this->db->update('surat');

            // var_dump($tgl_masuk);
            // die();

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Data berhasil di edit ! 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('konsepsurat/surat');
        }
    }

        public function hapus($id_surat)
        {
            if($this->surat_model->hapusDataSurat($id_surat) == false)
            {
                $this->session->set_flashdata('flashdata', 'gagal');
                $this->session->set_flashdata('pesan2','Gagal Di hapus, Karena Data User di pakai');
                redirect('konsepsurat/surat');
            }else{
                $this->load->library('session');
                $this->session->set_flashdata('flashdata', 'dihapus');
                $this->session->set_flashdata('pesan2','Data Berhasil Di hapus');
                redirect('konsepsurat/surat','refresh');
            } 
        }
        
        public function detailSuratMasuk($id_surat){
            $data['user'] = $this->user_model->getUser($this->session->userdata('id_user'));
            $data['surat']=$this->surat_model->getSurat($id_surat);
            $this->load->view('templatekonsep/header_konsep',$data);
            $this->load->view('templatekonsep/sidebar_konsep',$data);
            $this->load->view('templatekonsep/topbar_konsep',$data); 
            $this->load->view('konsepsurat/arsip_surat/detailsuratmasuk' ,$data);
            $this->load->view('templatekonsep/footer_konsep',$data); 
        } 

        public function detailSuratKeluar($id_surat){
            $data['user'] = $this->user_model->getUser($this->session->userdata('id_user'));
            $data['surat']=$this->surat_model->getSurat($id_surat);
            $this->load->view('templatekonsep/header_konsep',$data);
            $this->load->view('templatekonsep/sidebar_konsep',$data);
            $this->load->view('templatekonsep/topbar_konsep',$data); 
            $this->load->view('konsepsurat/arsip_surat/detailsuratkeluar' ,$data);
            $this->load->view('templatekonsep/footer_konsep',$data); 
        }  
        
        public function download($id_surat){
            $this->load->helper('download');
            $fileinfo = $this->surat_model->download($id_surat);
            $file = './assets/suratjadi/'.$fileinfo['surat_jadi'];
            force_download($file, NULL);
        }

        public function download2($id_surat){
            $this->load->helper('download');
            $fileinfo = $this->surat_model->download($id_surat);
            $file = './assets/filesurat/'.$fileinfo['file_surat'];
            force_download($file, NULL);
        }
    }
        /* End of fils admin.php */
    

?>