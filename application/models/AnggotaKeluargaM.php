<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnggotaKeluargaM extends CI_Model {

    public function insert($data){
        return $this->db->insert('anggota_keluarga', $data);    
    }
}

/* End of file AnggotaKeluargaM.php */
/* Location: ./application/models/AnggotaKeluargaM.php */