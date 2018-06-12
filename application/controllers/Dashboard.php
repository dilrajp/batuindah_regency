<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	 	$this->load->library('Template');
	 	$this->load->library('session');   
		$this->load->library('form_validation');
		$this->load->helper('text');
	 	$this->load->helper(array('url','html','form','download'));	
		$this->load->model('UserPemakaiM');
		$this->load->model('RoleM');

		if ($this->session->userdata('username')=="") {
			echo "<script>alert('Session telah habis!');
                    window.location.href='".base_url('login')."';
                </script>";
		}
        $this->gallery_path = realpath(APPPATH . '../data/images/user/');
       	$this->gallery_path_url = base_url() . 'data/images/user/';
	}

	
	public function index()
	{
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');

		$data['menu'] 			= 'dashboard';
		$data['hirarki_menu'] 	= 'dashboard';
		$data['judulHeader'] 	= '';

		if(ucwords($this->session->userdata('nama_role')) == 'Penghuni'){
			$data['data'] = array();
		}else{
			$data['data'] = $this->db->query("SELECT * FROM pengajuan_surat WHERE is_cetak = '0'")->result();
		}

		$this->template->display('dashboard', $data);
	}

	public function keluar() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('nama_role');
		session_destroy();
		redirect('login');
	}

	public function edit_profile($id = null)
	{	
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');
        	
		$data['judulHeader'] 	= 'Ubah Profile User';
		$data['menu'] 			= 'dashboard';
		$data['hirarki_menu'] 	= 'dashboard';
		
		$data['editdata'] 		= $this->db->get_where('user_pemakai',array('id_user_pemakai'=>$id))->row();
		$data['role'] 			= $this->db->select('*')
								->from('role')
								->where('id_role !=',1)
								->where('is_aktif =',true)
								->get()->result_object();	
								
		$this->template->display('edit_profile',$data);
	}

	public function edit_profile_proses(){
		$status_upload	= true;

		$id_user 		= $this->input->post('id');
		$username 		= $this->input->post('username');
		$password 		= $this->input->post('password_baru');
		$password_lama	= $this->input->post('password_lama');
		$photo_lama 	= $this->input->post('photo_lama');
		$photo 			= $this->input->post('photo');

		if(empty($password)){
			$password = $this->input->post('password_lama');
		}

		// upload foto
		$config['upload_path']    = $this->gallery_path;
     	$config['allowed_types']  = 'gif|jpg|png|jpeg|pdf|doc|txt|xml|zip|rar|docx|xls|xlsx';
     	$config['max_size']       = '2000';
     	$config['max_width']      = '2000';
     	$config['max_height']     = '2000';
     	$config['file_name']      = 'user-'.trim(str_replace(" ","",date('dmYHis')));

     	$this->load->library('upload', $config);
 	 	$this->upload->initialize($config);

 		if ($this->upload->do_upload("photo")){
 			$photo = $this->upload->file_name;
			$status_upload = true;			
 		}else{	
 			$photo = $photo_lama;	
 			$status_upload = true;
 		} 

		$object = array(
			'username'=>$username,
			'password'=>$password,
			'photo'=>$photo,
		);

		$this->db->where('id_user_pemakai', $id_user);
		$this->db->update('user_pemakai', $object);
		if($this->db->affected_rows() && $status_upload){
			$data_user = $this->db->get_where('user_pemakai',array('id_user_pemakai'=>$id_user))->row();
			$sess_data['id_user']   = $data_user->id_user_pemakai;
            $sess_data['id_penghuni']  = $data_user->id_penghuni;
            $sess_data['id_role']  = $data_user->id_role;
            $sess_data['username']  = $data_user->username;
            $sess_data['nama_role'] = $data_user->nama_role;
            $sess_data['photo']     = $data_user->photo;
            $this->session->set_userdata($sess_data);
			echo "<script>alert('Data Profile berhasil diubah!');
                    window.location.href='".base_url('dashboard')."';
                </script>";
		}else{
			echo "<script>alert('Data Profile gagal diubah!');
                    window.location.href='".base_url('dashboard')."';
                </script>";
		}
	}

	public function notifikasiAgenda(){
		$idp =  $this->session->userdata('id_penghuni');
		$agenda = $this->db->query("SELECT * from notifikasi_agenda join agenda on(agenda.id_agenda = notifikasi_agenda.id_agenda) WHERE id_penghuni = '$idp'");
		$data['jumlah'] = $agenda->num_rows();
		$data['agenda'] = $agenda->result();
		
		echo json_encode($data);
	}

	public function clearNotif(){
	$idp =  $this->session->userdata('id_penghuni');
	foreach($this->db->query("SELECT id_penghuni FROM notifikasi_agenda WHERE id_penghuni = '$idp'")->result() as $row){
		$id = $row->id_penghuni;
		$hapus = $this->db->delete('notifikasi_agenda', array('id_penghuni' => $id)); 
	}
	if($hapus){
        echo false;
    } else {
        echo true;
    }
	}


	public function getAgenda(){
		
		$res = $this->db->query("SELECT jenis_agenda,tanggal_agenda,isi_agenda FROM agenda")->result();
		$arr = array();
		foreach($res as $a){

		$temp = array(
             'date' => $a->tanggal_agenda,
             'title'   =>$a->jenis_agenda,
             'description'    => $a->isi_agenda
         );
		array_push($arr,$temp);
		}
	
		$data =json_encode($arr);
		echo $data;

	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */

