<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class jabatan_model extends CI_Model {

        public function tampilJabatan(){
            return $this->db->get('jabatan')->result();
        }
}