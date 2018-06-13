<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanM extends CI_Model {

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


}

/* End of file RoleM.php */
/* Location: ./application/models/RoleM.php */