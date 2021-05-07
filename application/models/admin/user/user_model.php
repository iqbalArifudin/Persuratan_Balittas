<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {

    public function tampilUser($id_user)
    {
        return $this->db->get('user', ['id_user' => $id_user])->result();
    }

    public function tampilSemuaUser()
    {
        return $this->db->get('user')->result();
    }

    public function tambahDatauser($upload){
		$data=[
            'id_user'=>$this->input->post('id_user', true),
            'nama'=>$this->input->post('nama', true),
            'email'=>$this->input->post('email', true),
            'no_telp'=>$this->input->post('no_telp', true),
            'username'=>$this->input->post('username', true),
            'password'=>$this->input->post('password', true),
            'foto'=>$upload['file']['file_name'],
            'jabatan'=>$this->input->post('jabatan', true),
		];
	$this->db->insert('user', $data);
    }
    public function upload(){    
        $config['upload_path'] = './assets/fotoprofil/';    
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']     = '10000';

        $this->load->library('upload', $config);

        if($this->upload->do_upload('foto')){
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');      
            return $return;
        }else{    
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());      return $return;   
        }  
    }
    
   
    public function hapusDataUser($id_user)
	{
        $this->db->where('id_user', $id_user);
        if(
            $this->db->delete('user')
            
        ){
            return true;
        }else{
            return false;
        }
    }

    public function getUser($id_user){  
        $this->db->select('user.*');
        $this->db->where('id_user', $id_user);
        return $this->db->get('user')->result();
	}

    public function ubahDataUser($id_user,$upload){
		$data=[
            'id_user'=>$this->input->post('id_user', true),
            'nama'=>$this->input->post('nama', true),
            'email'=>$this->input->post('email', true),
            'no_telp'=>$this->input->post('no_telp', true),
            'username'=>$this->input->post('username', true),
            'password'=>$this->input->post('password', true),
            'foto'=>$upload['file']['file_name'],
            'jabatan'=>$this->input->post('jabatan', true),
		];
        $this->db->where('id_user', $id_user);	
        $this->db->update('user', $data);
    }

    public function getDetailUser($id_user){
        $this->db->select('user.*');
        $this->db->where('id_user', $id_user);
        return $this->db->get('user')->result();  
    }
    
}    