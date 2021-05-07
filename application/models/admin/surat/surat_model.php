<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class surat_model extends CI_Model {

    public function tampilSurat()
    {
        $this->db->select('surat.*, user.nama, user.jabatan');
        $this->db->join('user', 'surat.id_user = user.id_user');
        return $this->db->get('surat')->result();
    }

    public function tampilSuratKonsep($id_user){
        $this->db->select('surat.*, user.nama, user.jabatan');
        $this->db->join('user', 'surat.id_user = user.id_user');
        $this->db->where('surat.id_user', $id_user);
        return $this->db->get('surat')->result();
    }

    
    //arsip surat
    public function tampilSuratMasuk()
    {
        $this->db->select('surat.*, user.nama, user.jabatan');
        $this->db->join('user', 'surat.id_user = user.id_user');
        return $this->db->get('surat')->result();
    }


    public function tambahDataSurat($upload, $upload1){
		$data=[
            'id_surat'=>$this->input->post('id_surat', true),
            'id_user'=>$this->session->userdata('id_user'),
            'dari'=>$this->input->post('dari', true),
            'perihal'=>$this->input->post('perihal', true),
            'tgl_masuk'=>$this->input->post('tgl_masuk', true),
            'tgl_diterima'=>'belum diterima',
            'status'=>'masih diajukan',
            'keterangan'=>'-',
            'file_surat'=>$upload['file']['file_name'],
            'lampiran'=>$upload1['file']['file_name'],
		];
	$this->db->insert('surat', $data);
    }

    public function upload(){    
        $config['upload_path'] = './assets/filesurat/';  
        $config['allowed_types'] = 'doc|docx|pdf|png|jpg|jpeg';  
        $config['max_size']     = '750000';

        $this->load->library('upload', $config);

        if($this->upload->do_upload('file_surat')){
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');      
            return $return;
        }else{    
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());      return $return;   
        }  
    }

    public function upload1(){    
        $config['upload_path'] = './assets/lampiran/';  
        $config['allowed_types'] = 'doc|docx|pdf|png|jpg|jpeg';  
        $config['max_size']     = '750000';

        $this->load->library('upload', $config);

        if($this->upload->do_upload('lampiran')){
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');      
            return $return;
        }else{    
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());      return $return;   
        }  
    }
    
   
    public function hapusDataSurat($id_surat)
	{
        $this->db->where('id_surat', $id_surat);
        if(
            $this->db->delete('surat')
        ){
            return true;
        }else{
            return false;
        }
    }

    public function getSurat($id_surat){  
        $this->db->select('surat.*, user.nama, user.jabatan');
        $this->db->join('user', 'surat.id_user = user.id_user');
        $this->db->where('id_surat', $id_surat);
        return $this->db->get('surat')->result();
    }
    
    public function getDetailSurat($id_surat){
        $this->db->select('surat.*, user.nama, user.jabatan');
        $this->db->join('user', 'surat.id_user = user.id_user');
        $this->db->where('id_surat', $id_surat);
        return $this->db->get('surat')->result();
    }

    public function ubahSurat($id_surat){
		$data=[
            'id_surat'=>$this->input->post('id_surat', true),
            'dari'=>$this->input->post('dari', true),
            'perihal'=>$this->input->post('perihal', true),
            'tgl_masuk'=>$this->input->post('tgl_masuk', true),
            'tgl_diterima'=>$this->input->post('tgl_diterima', true),
            'status'=>$this->input->post('status', true),
            'keterangan'=>$this->input->post('keterangan', true),
		];
        $this->db->where('id_surat', $id_surat);	
        $this->db->update('surat', $data);
    }

    public function download($id_surat){
        $query = $this->db->get_where('surat',array('id_surat'=>$id_surat));
        return $query->row_array();
    }
    
    public function download_lampiran($id_surat){
        $query = $this->db->get_where('surat',array('id_surat'=>$id_surat));
        return $query->row_array();
    }
    
}    