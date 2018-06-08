<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rumah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Template');
		$this->load->helper(array('url','html','form','download'));
		$this->load->library('form_validation');
		$this->load->library('session');      
        $this->load->model('RumahM');
        
        if ($this->session->userdata('username')=="") {
			echo "<script>alert('Session telah habis!');
                    window.location.href='".base_url('login')."';
                </script>";
		}
	}

	public function index($id=NULL)
	{
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');

		$data['judulHeader'] 	= 'Data Rumah';
		$data['hirarki_menu'] 	= 'master_data';
		$data['menu'] 			= 'rumah';
	 	
	 	$data['data'] 	= $this->RumahM->tampilDataRumah();
		$this->template->display('rumah/admin',$data);
	}

	public function tambah()
	{
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');

		$data['judulHeader'] 	= 'Tambah Rumah';
		$data['hirarki_menu'] 	= 'master_data';
		$data['menu'] 			= 'rumah';

		$data['blok']  			= $this->db->select('*')
								->from('blok')
								->where('is_aktif =',true)
								->get()->result_object();
		$this->template->display('rumah/tambah',$data);
	}

	public function insert()
	{
		$status = '';
		$message = '';

		$id_blok = $this->input->post('id_blok');
		$nama_pemilik = $this->input->post('nama_pemilik');
		$no_rumah = $this->input->post('no_rumah');
		$alamat_lengkap = $this->input->post('alamat_lengkap');
		$status_rumah = $this->input->post('status_rumah');
		$is_aktif  = true;

		$object = array(
			'id_blok'=>$id_blok,
			'nama_pemilik'=>$nama_pemilik,
			'no_rumah'=>$no_rumah,
			'alamat_lengkap'=>$alamat_lengkap,
			'status_rumah'=>$status_rumah,
			'is_aktif'=>$is_aktif
		);

		$insert = $this->RumahM->insert($object);
		
		if($insert){
			$status = 'berhasil';
		}

		if($status == 'berhasil'){
			$message = array('message'=>'Data berhasil disimpan', 'class'=>'alert alert-success fade in');
			$this->session->set_flashdata('item', $message);
		}else{
			$message = array('message'=>'Data gagal disimpan', 'class'=>'alert alert-error fade in');
			$this->session->set_flashdata('item', $message);			
		}
		$this->session->keep_flashdata('item',$message);
		redirect('Rumah');
	}

	public function hapus($id)
	{
		$message = '';

		$hapus = $this->RumahM->delete($id);
		
		if($this->db->affected_rows()){
			$message = array('message'=>'Data berhasil dihapus', 'class'=>'alert alert-success fade in');
			$this->session->set_flashdata('item', $message);
		}else{
			$message = array('message'=>'Data gagal dihapus', 'class'=>'alert alert-error fade in');
			$this->session->set_flashdata('item', $message);			
		}
		$this->session->keep_flashdata('item',$message);
		redirect('Rumah');
	}

	public function edit($id = null)
	{		
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');
        
		$data['judulHeader'] 	= 'Ubah Data Rumah';
		$data['hirarki_menu'] 	= 'master_data';
		$data['menu'] 			= 'rumah';

		$data['editdata'] 		= $this->db->get_where('rumah',array('id_rumah'=>$id))->row();
		$data['blok']  			= $this->db->select('*')
								->from('blok')
								->where('is_aktif =',true)
								->get()->result_object();
		$this->template->display('rumah/edit',$data);
	}

	public function update()
	{
		$message = '';

		$id_rumah = $this->input->post('id_rumah');
		$id_blok = $this->input->post('id_blok');
		$nama_pemilik = $this->input->post('nama_pemilik');
		$no_rumah = $this->input->post('no_rumah');
		$alamat_lengkap = $this->input->post('alamat_lengkap');
		$status_rumah = $this->input->post('status_rumah');

		$object = array(
			'id_blok'=>$id_blok,
			'nama_pemilik'=>$nama_pemilik,
			'no_rumah'=>$no_rumah,
			'alamat_lengkap'=>$alamat_lengkap,
			'status_rumah'=>$status_rumah,
		);

		$this->db->where('id_rumah', $id_rumah);
		$this->db->update('rumah', $object);

		if($this->db->affected_rows()){
			$message = array('message'=>'Data berhasil diubah', 'class'=>'alert alert-success fade in');
			$this->session->set_flashdata('item', $message);
		}else{
			$message = array('message'=>'Data gagal diubah', 'class'=>'alert alert-error fade in');
			$this->session->set_flashdata('item', $message);			
		}
		$this->session->keep_flashdata('item',$message);
		redirect('Rumah');
	}

	public function block_aktif($id)
	{
		$aksi 	= $this->input->get('aksi');
		$is_aktif = '';
		$message = '';

		if($aksi == 'aktif'){
			$is_aktif = true;
		}else{
			$is_aktif = false;
		}
		$object = array(
			'is_aktif'=>$is_aktif,
		);

		$this->db->where('id_rumah', $id);
		$this->db->update('rumah', $object);

		if($this->db->affected_rows()){
			$message = array('message'=>'Data berhasil di-aktif/non-aktif kan', 'class'=>'alert alert-success fade in');
			$this->session->set_flashdata('item', $message);
		}else{
			$message = array('message'=>'Data gagal di-aktif/non-aktif kan', 'class'=>'alert alert-error fade in');
			$this->session->set_flashdata('item', $message);			
		}
		$this->session->keep_flashdata('item',$message);
		redirect('Rumah');
	}
}

/* End of file Rumah.php */
/* Location: ./application/controllers/Rumah.php */