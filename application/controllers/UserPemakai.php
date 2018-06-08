<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserPemakai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Template');
		$this->load->helper(array('url','html','form','download'));
		$this->load->library('form_validation');
		$this->load->library('session');      
        $this->load->model('UserPemakaiM');
        $this->load->model('RoleM');
        
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

		$data['judulHeader'] 	= 'Data User Pemakai';
		$data['hirarki_menu'] 	= 'master_user';
		$data['menu'] 			= 'user_pemakai';
	 	
	 	$data['data'] 	= $this->UserPemakaiM->tampilDataUserPemakai();
		$this->template->display('user_pemakai/admin',$data);
	}

	public function tambah()
	{
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');

		$data['judulHeader'] 	= 'Tambah User Pemakai';
		$data['hirarki_menu'] 	= 'master_user';
		$data['menu'] 			= 'user_pemakai';

		$data['role']  			= $this->db->select('*')
								->from('role')
								->where('is_aktif =',true)
								->where('id_role !=',1)
								->get()->result_object();

		$data['peng']  		= $this->db->select('*')
								->from('penghuni')
								->where('is_aktif =',true)
								->get()->result_object();
		$this->template->display('user_pemakai/tambah',$data);
	}

	public function insert()
	{
		$status = '';
		$message = '';

		$id_role = $this->input->post('id_role');
		$id_role = !empty($id_role) ? $id_role : 3;
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$is_aktif  = true;
		if($id_role != 3){
		$object = array(
			'id_role'=>$id_role,
			'username'=>$username,
			'password'=>$password,
			'is_aktif'=>$is_aktif
		);
		}else{
		$object = array(
			'id_role'=> $id_role,
			'username'=> $username,
			'password'=> $password,
			'is_aktif'=> $is_aktif,
			'id_penghuni' => $this->input->post('id_penghuni')
		);	
		}

		$insert = $this->UserPemakaiM->insert($object);
		
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
		redirect('UserPemakai');
	}

	public function hapus($id)
	{
		$message = '';

		$hapus = $this->UserPemakaiM->delete($id);
		
		if($this->db->affected_rows()){
			$message = array('message'=>'Data berhasil dihapus', 'class'=>'alert alert-success fade in');
			$this->session->set_flashdata('item', $message);
		}else{
			$message = array('message'=>'Data gagal dihapus', 'class'=>'alert alert-error fade in');
			$this->session->set_flashdata('item', $message);			
		}
		$this->session->keep_flashdata('item',$message);
		redirect('userPemakai');
	}

	public function edit($id_user_pemakai = null)
	{		
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');
        
		$data['judulHeader'] 	= 'Ubah Data User Pemakai';
		$data['hirarki_menu'] 	= 'master_user';
		$data['menu'] 			= 'user_pemakai';

		$data['editdata'] 		= $this->db->get_where('user_pemakai',array('id_user_pemakai'=>$id_user_pemakai))->row();
		$data['role']  			= $this->db->select('*')
								->from('role')
								->where('is_aktif =',true)
								->get()->result_object();
		$this->template->display('user_pemakai/edit',$data);
	}

	public function update()
	{
		$message = '';

		$id_user_pemakai = $this->input->post('id_user_pemakai');
		$username = $this->input->post('username');
		$password_baru = $this->input->post('password_baru');
		$password = $this->input->post('password');
		$id_role = $this->input->post('id_role');
		$id_role = !empty($id_role) ? $id_role : 3;
		if(!empty($password_baru)){
			$password = $password_baru;
		}else{
			$password = $password;
		}

		$object = array(
			'username'=>$username,
			'password'=>$password,
			'id_role'=>$id_role
		);

		$this->db->where('id_user_pemakai', $id_user_pemakai);
		$this->db->update('user_pemakai', $object);

		if($this->db->affected_rows()){
			$message = array('message'=>'Data berhasil diubah', 'class'=>'alert alert-success fade in');
			$this->session->set_flashdata('item', $message);
		}else{
			$message = array('message'=>'Data gagal diubah', 'class'=>'alert alert-error fade in');
			$this->session->set_flashdata('item', $message);			
		}
		$this->session->keep_flashdata('item',$message);
		redirect('UserPemakai');
	}

	public function block_aktif($id_user_pemakai)
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

		$this->db->where('id_user_pemakai', $id_user_pemakai);
		$this->db->update('user_pemakai', $object);

		if($this->db->affected_rows()){
			$message = array('message'=>'Data berhasil di-aktif/non-aktif kan', 'class'=>'alert alert-success fade in');
			$this->session->set_flashdata('item', $message);
		}else{
			$message = array('message'=>'Data gagal di-aktif/non-aktif kan', 'class'=>'alert alert-error fade in');
			$this->session->set_flashdata('item', $message);			
		}
		$this->session->keep_flashdata('item',$message);
		redirect('userPemakai');
	}
}

/* End of file UserPemakai.php */
/* Location: ./application/controllers/UserPemakai.php */