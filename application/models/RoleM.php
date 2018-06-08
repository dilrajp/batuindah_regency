<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoleM extends CI_Model {

    public function insert($data){
        return $this->db->insert('role', $data);    
    }

    public function tampilDataRole()
	{
		$data = $this->db->get('role');

		return $data->result();
	}

	public function delete($id){
		return $this->db->delete('role', array('id_role'=>$id));	
	}

    public function dd_role(){
		// ambil data dari db
		$this->db->where('is_aktif is TRUE');
		$this->db->order_by('nama','asc');
		$result = $this->db->get('role');

		// membuat array
		$dd[''] = '-Pilih Role-';
		if($result->num_rows() > 0){
			foreach($result->result() as $row){
				$dd[$row->id_role] = $row->nama;
			}
		}
		return $dd;
	}
}

/* End of file RoleM.php */
/* Location: ./application/models/RoleM.php */