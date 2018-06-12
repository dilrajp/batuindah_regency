<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratM extends CI_Model {

    public function insert($data){
        return $this->db->insert('pengajuan_surat', $data);    
    }

    public function getAnggota($id){
    	$this->db->where('id_penghuni',$id);
        return $this->db->get('anggota_keluarga');    
    }
    public function getSurat($id){
    	$this->db->where('id_surat',$id);
        return $this->db->get('pengajuan_surat');    
    }
    public function getSuratAnggota($id){
    	
        return $this->db->query("SELECT nama,pengajuan_surat.id_anggota,pengajuan_surat.isi_surat,pengajuan_surat.keterangan,tempat_lahir,tanggal_lahir,anggota_keluarga.jeniskelamin,anggota_keluarga.no_ktp,rumah.alamat_lengkap FROM `pengajuan_surat` JOIN anggota_keluarga on(anggota_keluarga.id_anggota = pengajuan_surat.id_anggota) join penghuni on(anggota_keluarga.id_penghuni = penghuni.id_penghuni) join rumah on(penghuni.id_rumah = rumah.id_rumah) WHERE id_surat ='$id'");    
    }
    public function getSuratPenghuni($id){
    	
        return $this->db->query("SELECT * FROM `pengajuan_surat` join penghuni on(pengajuan_surat.id_penghuni = penghuni.id_penghuni) join rumah on(penghuni.id_rumah = rumah.id_rumah) WHERE id_surat ='$id'");    
    }
    
    
}

/* End of file RoleM.php */
/* Location: ./application/models/RoleM.php */