<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blok extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Template');
		$this->load->helper(array('url','html','form','download'));
		$this->load->library('form_validation');
		$this->load->library('session');      
        $this->load->model('BlokM');
        
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

		$data['judulHeader'] 	= 'Data Blok';
		$data['hirarki_menu'] 	= 'master_data';
		$data['menu'] 			= 'blok';
	 	
	 	$data['data'] 	= $this->BlokM->tampilDataBlok();
		$this->template->display('blok/admin',$data);
	}

	public function tambah()
	{
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');

		$data['judulHeader'] 	= 'Tambah Blok';
		$data['hirarki_menu'] 	= 'master_data';
		$data['menu'] 			= 'blok';

		$this->template->display('blok/tambah',$data);
	}

	public function insert()
	{
		$status = '';
		$message = '';

		$nama_blok = $this->input->post('nama_blok');
		$is_aktif  = true;

		$object = array(
			'nama_blok'=>$nama_blok,
			'is_aktif'=>$is_aktif
		);

		$insert = $this->BlokM->insert($object);
		
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
		redirect('Blok');
	}

	public function hapus($id)
	{
		$message = '';

		$hapus = $this->BlokM->delete($id);
		
		if($this->db->affected_rows()){
			$message = array('message'=>'Data berhasil dihapus', 'class'=>'alert alert-success fade in');
			$this->session->set_flashdata('item', $message);
		}else{
			$message = array('message'=>'Data gagal dihapus', 'class'=>'alert alert-error fade in');
			$this->session->set_flashdata('item', $message);			
		}
		$this->session->keep_flashdata('item',$message);
		redirect('blok');
	}

	public function edit($id = null)
	{		
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');

		$data['judulHeader'] 	= 'Ubah Data Blok';
		$data['hirarki_menu'] 	= 'master_data';
		$data['menu'] 			= 'blok';
		

		$data['editdata'] 		= $this->db->get_where('Blok',array('id_blok'=>$id))->row();
		$this->template->display('blok/edit',$data);
	}

	public function lihat($id = null)
	{		
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');
        
		$data['judulHeader'] 	= 'Ubah Data Blok';
		$data['hirarki_menu'] 	= 'master_data';
		$data['menu'] 			= 'blok';

		$data['lihat_blok'] 	= $this->db->get_where('blok',array('id_blok'=>$id))->row();
		$data['lihat_rumah'] 	= $this->db->get_where('rumah',array('id_blok'=>$id))->result_object();
		$this->template->display('blok/lihat',$data);
	}

	public function update()
	{
		$message = '';

		$id_blok = $this->input->post('id_blok');
		$nama_blok = $this->input->post('nama_blok');

		$object = array(
			'nama_blok'=>$nama_blok,
		);

		$this->db->where('id_blok', $id_blok);
		$this->db->update('blok', $object);

		if($this->db->affected_rows()){
			$message = array('message'=>'Data berhasil diubah', 'class'=>'alert alert-success fade in');
			$this->session->set_flashdata('item', $message);
		}else{
			$message = array('message'=>'Data gagal diubah', 'class'=>'alert alert-error fade in');
			$this->session->set_flashdata('item', $message);			
		}
		$this->session->keep_flashdata('item',$message);
		redirect('blok');
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

		$this->db->where('id_blok', $id);
		$this->db->update('Blok', $object);

		if($this->db->affected_rows()){
			$message = array('message'=>'Data berhasil di-aktif/non-aktif kan', 'class'=>'alert alert-success fade in');
			$this->session->set_flashdata('item', $message);
		}else{
			$message = array('message'=>'Data gagal di-aktif/non-aktif kan', 'class'=>'alert alert-error fade in');
			$this->session->set_flashdata('item', $message);			
		}
		$this->session->keep_flashdata('item',$message);
		redirect('blok');
	}
}

/* End of file Blok.php */
/* Location: ./application/controllers/Blok.php */