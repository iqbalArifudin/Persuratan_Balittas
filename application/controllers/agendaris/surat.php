<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class surat extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('admin/surat/surat_model');
            $this->load->model('admin/user/user_model');
            // $this->load->helper(array('url','download'));
            $this->load->helper('url');
            $this->load->helper('form');
        }
        
        public function index()
        {
        //    $this->admin_model->index();
        $data['surat'] = $this->surat_model->tampilSurat();
        $data['user'] = $this->user_model->getUser($this->session->userdata('id_user'));
        $this->load->view('templateagendaris/header',$data);
        $this->load->view('templateagendaris/sidebar',$data);
        $this->load->view('templateagendaris/topbar',$data); 
        $this->load->view('agendaris/kelola_surat/indextambah',$data);
        $this->load->view('templateagendaris/footer',$data);  
        
        }	

        public function hapus($id_surat)
        {
            if($this->surat_model->hapusDataSurat($id_surat) == false)
            {
                $this->session->set_flashdata('flashdata', 'gagal');
                $this->session->set_flashdata('pesan2','Gagal Di hapus, Karena Data User di pakai');
                redirect('agendaris/surat');
            }else{
                $this->load->library('session');
                $this->session->set_flashdata('flashdata', 'dihapus');
                $this->session->set_flashdata('pesan2','Data Berhasil Di hapus');
                redirect('agendaris/surat','refresh');
            } 
        }
        
        // public function edit($id_surat){
        //     $this->load->library('form_validation');
        //     $data ['surat'] = $this->surat_model->getSurat($id_surat);
        //     $data['user'] = $this->user_model->getUser($this->session->userdata('id_user'));
        //     $this->form_validation->set_rules('tgl_diterima', 'tgl_diterima', 'required');

        //     if($this->form_validation->run() == FALSE){
        //         $this->load->view('templateagendaris/header',$data);
        //         $this->load->view('templateagendaris/sidebar',$data);
        //         $this->load->view('templateagendaris/topbar',$data); 
        //         $this->load->view('agendaris/kelola_surat/edit' ,$data);
        //         $this->load->view('templateagendaris/footer',$data); 
        //     }
        //     else{
        //             $this->surat_model->ubahSurat($id_surat);   
        //             $this->session->set_flashdata('pesan3','Data Berhasil Di edit');
        //             $this->load->library('session');
        //             redirect('agendaris/surat','refresh');
        //     }
        // }

        public function editsurat($id_surat)
        {
        $data ['surat'] = $this->surat_model->getSurat($id_surat);
        $data['user'] = $this->user_model->getUser($this->session->userdata('id_user'));
        $this->form_validation->set_rules('dari', 'dari', 'required|trim');
        $this->form_validation->set_rules('perihal', 'perihal', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templateagendaris/header',$data);
            $this->load->view('templateagendaris/sidebar',$data);
            $this->load->view('templateagendaris/topbar',$data); 
            $this->load->view('agendaris/kelola_surat/edit' ,$data);
            $this->load->view('templateagendaris/footer',$data); 
        } else {

            //check jika ada gambar yang akan di upload
            $upload_file = $_FILES['surat_jadi']['name'];
            if ($upload_file) {
                $config['upload_path'] = './assets/suratjadi/';  
                $config['allowed_types'] = 'doc|docx|pdf|png|jpg';  
                $config['max_size']     = '10000';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('surat_jadi')) {
                    $old_file = $data['surat']['surat_jadi'];
                    if ($old_file != 'default.png') {
                        unlink(FCPATH . './assets/suratjadi/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('surat_jadi', $new_file);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $id_surat = $this->input->post('id_surat');
            $dari = $this->input->post('dari');
            $perihal = $this->input->post('perihal');
            $tgl_masuk = $this->input->post('tgl_masuk');
            $tgl_diterima = $this->input->post('tgl_diterima');
            $status = $this->input->post('status');
            $keterangan = $this->input->post('keterangan');

            $this->db->set('dari', $dari);
            $this->db->set('perihal', $perihal);
            $this->db->set('tgl_masuk', $tgl_masuk);
            $this->db->set('tgl_diterima', $tgl_diterima);
            $this->db->set('status', $status);
            $this->db->set('keterangan', $keterangan);
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
            redirect('agendaris/surat');
        }
    }

        public function download($id_surat){
            $this->load->helper('download');
            $fileinfo = $this->surat_model->download($id_surat);
            $file = './assets/suratjadi/'.$fileinfo['surat_jadi'];
            force_download($file, NULL);
        }

        public function suratKeluar(){
            $data['user'] = $this->user_model->getUser($this->session->userdata('id_user'));
            $data['surat'] = $this->surat_model->tampilSuratKonsep($this->session->userdata('id_user'));
            $this->load->view('templateagendaris/header',$data);
            $this->load->view('templateagendaris/sidebar',$data);
            $this->load->view('templateagendaris/topbar',$data); 
            $this->load->view('agendaris/arsip_surat/suratkeluar',$data);
            $this->load->view('templateagendaris/footer',$data);  
        }

        public function detailSuratKeluar($id_surat){
            $data['user'] = $this->user_model->tampilUser($this->session->userdata('id_user'));
            $data['surat']=$this->surat_model->getSurat($id_surat);
            $this->load->view('templateagendaris/header',$data);
            $this->load->view('templateagendaris/sidebar',$data);
            $this->load->view('templateagendaris/topbar',$data); 
            $this->load->view('agendaris/arsip_surat/detailsuratkeluar' ,$data);
            $this->load->view('templateagendaris/footer',$data); 
        } 

    }
        /* End of fils admin.php */
    

?>