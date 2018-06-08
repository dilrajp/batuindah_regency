<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RumahM extends CI_Model {

    public function insert($data){
        return $this->db->insert('rumah', $data);    
    }

    public function tampilDataRumah()
	{
		$this->db->select('rumah.*, blok.nama_blok as nama_blok');
        $this->db->join('blok','blok.id_blok = rumah.id_blok','left');
        $data = $this->db->get('rumah');

        return $data->result();
	}

	public function delete($id){
		return $this->db->delete('rumah', array('id_rumah'=>$id));	
	}

    public function dd_rumah(){
		// ambil data dari db
		$this->db->where('is_aktif is TRUE');
		$this->db->order_by('nama_rumah','asc');
		$result = $this->db->get('rumah');

		// membuat array
		$dd[''] = '-Pilih Rumah-';
		if($result->num_rows() > 0){
			foreach($result->result() as $row){
				$dd[$row->id] = $row->nama_rumah;
			}
		}
		return $dd;
	}
}

/* End of file RumahM.php */
/* Location: ./application/models/RumahM.php */