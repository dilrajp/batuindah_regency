<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenghuniM extends CI_Model {

    public function insert($data){
        return $this->db->insert('penghuni', $data);    
    }

    public function tampilDataPenghuni()
	{
		$this->db->select('penghuni.*, rumah.nama_pemilik as nama_pemilik');
        $this->db->join('rumah','rumah.id_rumah = penghuni.id_rumah','left');
        $data = $this->db->get('penghuni');

        return $data->result();
	}

	public function tampilDataRT()
	{
		$this->db->select('*');
         $this->db->join('rumah','rumah.id_rumah = penghuni.id_rumah');
        $this->db->join('blok','rumah.id_blok = blok.id_blok');
        $this->db->join('user_pemakai','penghuni.id_penghuni = user_pemakai.id_penghuni');
        $this->db->join('role','user_pemakai.id_role = role.id_role');
        $this->db->where("role.nama","RT");
        $data = $this->db->get('penghuni');

        return $data->result();
	}
	public function tampilDataRW()
	{
		$this->db->select('*');
        $this->db->join('rumah','rumah.id_rumah = penghuni.id_rumah');
        $this->db->join('blok','rumah.id_blok = blok.id_blok');
        $this->db->join('user_pemakai','penghuni.id_penghuni = user_pemakai.id_penghuni');
        $this->db->join('role','user_pemakai.id_role = role.id_role');
        $this->db->where("role.nama","RW");
        $data = $this->db->get('penghuni');

        return $data->result();
	}

	public function dataDiri($id)
	{
		$this->db->select('*');
        $this->db->join('rumah','rumah.id_rumah = penghuni.id_rumah');
        $this->db->join('blok','rumah.id_blok = blok.id_blok');
        $data = $this->db->get_where('penghuni',array('penghuni.id_penghuni' => $id));

        return $data->result();
	}	

	public function dataPenghuniLain()
	{
		$this->db->select('*');
        $this->db->join('rumah','rumah.id_rumah = penghuni.id_rumah');
        $this->db->join('blok','rumah.id_blok = blok.id_blok');
        $data = $this->db->get('penghuni');
        return $data->result();
	}	
	public function dataAnggota($id)
	{
		$this->db->select('*');
        $this->db->join('anggota_keluarga','anggota_keluarga.id_penghuni = penghuni.id_penghuni');
        $data = $this->db->get_where('penghuni',array('penghuni.id_penghuni' => $id));

        return $data->result();
	}

	public function delete($id){
		return $this->db->delete('penghuni', array('id'=>$id));	
	}

    public function dd_penghuni(){
		// ambil data dari db
		$this->db->where('is_aktif is TRUE');
		$this->db->order_by('nama_penghuni','asc');
		$result = $this->db->get('penghuni');

		// membuat array
		$dd[''] = '-Pilih Penghuni-';
		if($result->num_rows() > 0){
			foreach($result->result() as $row){
				$dd[$row->id] = $row->nama_penghuni;
			}
		}
		return $dd;
	}
}

/* End of file PenghuniM.php */
/* Location: ./application/models/PenghuniM.php */