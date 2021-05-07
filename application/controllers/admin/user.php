<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class user extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('admin/user/user_model');  
        }
        
        public function index()
        {
        //    $this->admin_model->index();s
        $data['user'] = $this->user_model->tampilUser($this->session->userdata('id_user'));
        $data['users'] = $this->user_model->tampilSemuaUser();
        // $data['users'] = $this->db->get('user')->result();
        $this->load->view('template/header_admin',$data);
        $this->load->view('template/sidebar_admin',$data);
        $this->load->view('template/topbar_admin',$data); 
        $this->load->view('admin/user/user', $data);
        $this->load->view('template/footer_admin',$data);  
        }

        public function tambahuser(){
            $data['user'] = $this->user_model->tampilUser($this->session->userdata('id_user'));
            $data2['users'] = $this->user_model->tampilSemuaUser();
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama', 'nama', 'required');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header_admin',$data);
                $this->load->view('template/sidebar_admin');
                $this->load->view('template/topbar_admin'); 
                $this->load->view('admin/user/tambahuser' ,$data2);
                $this->load->view('template/footer_admin');  
            }
            else{
                $upload = $this->user_model->upload();
                if ($upload['result'] == 'success'){
                    $this->user_model->tambahDatauser($upload);
                    $this->session->set_flashdata('pesan','Data Berhasil Di tambah');
                    redirect('admin/user','refresh');
                } else {
                    echo $upload['error'];
                }
                // $this->session->set_flashdata('name', 'value');
            }
        }

        public function hapus($id_user)
        {
            if($this->user_model->hapusDataUser($id_user) == false)
            {
                $this->session->set_flashdata('flashdata', 'gagal');
                $this->session->set_flashdata('pesan2','Gagal Di hapus, Karena Data User di pakai');
                redirect('Admin/user');
            }else{
                $this->load->library('session');
                $this->session->set_flashdata('flashdata', 'dihapus');
                $this->session->set_flashdata('pesan2','Data Berhasil Di hapus');
                redirect('Admin/user','refresh');
            }
           
        }

        public function edituser($id_user)
        {
        $data ['user'] = $this->user_model->getUser($id_user);
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');

        if ($this->form_validation->run() == false) {
                $this->load->view('template/header_admin',$data);
                $this->load->view('template/sidebar_admin',$data);
                $this->load->view('template/topbar_admin',$data); 
                $this->load->view('admin/user/edituser',$data);
                $this->load->view('template/footer_admin',$data); 
        } else {

            //check jika ada gambar yang akan di upload
            $upload_file = $_FILES['foto']['name'];
            if ($upload_file) {
                $config['upload_path'] = './assets/fotoprofil/';    
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size']     = '10000';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $old_file = $data['user']['foto'];
                    if ($old_file != 'default.png') {
                        unlink(FCPATH . './assets/fotoprofil/' . $old_file);
                    }
                    $new_file = $this->upload->data('file_name');
                    $this->db->set('foto', $new_file);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $id_user = $this->input->post('id_user');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $no_telp = $this->input->post('no_telp');
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $this->db->set('nama', $nama);
            $this->db->set('email', $email);
            $this->db->set('no_telp', $no_telp);
            $this->db->set('username', $username);
            $this->db->set('password', $password);
            $this->db->where('id_user', $id_user);
            $this->db->update('user');


            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Data berhasil di edit ! 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/user');
        }
    }
    
        public function detail($id_user){
            $data['title']='Detail User';
            $data['user']=$this->user_model->getDetailUser($id_user);
            $this->load->view('template/header_admin',$data);
            $this->load->view('template/sidebar_admin');
            $this->load->view('template/topbar_admin'); 
            $this->load->view('admin/user/detail' ,$data);
            $this->load->view('template/footer_admin'); 
        } 

    }
        /* End of fils admin.php */
?>