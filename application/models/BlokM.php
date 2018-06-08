<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BlokM extends CI_Model {

    public function insert($data){
        return $this->db->insert('blok', $data);    
    }

    public function tampilDataBlok()
	{
		$data = $this->db->get('blok');

		return $data->result();
	}

	public function delete($id){
		return $this->db->delete('blok', array('id'=>$id));	
	}

    public function dd_blok(){
		// ambil data dari db
		$this->db->where('is_aktif is TRUE');
		$this->db->order_by('nama_blok','asc');
		$result = $this->db->get('blok');

		// membuat array
		$dd[''] = '-Pilih Subjek-';
		if($result->num_rows() > 0){
			foreach($result->result() as $row){
				$dd[$row->id] = $row->nama_blok;
			}
		}
		return $dd;
	}
}

/* End of file BlokM.php */
/* Location: ./application/models/BlokM.php */