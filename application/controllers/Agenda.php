<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Template');
		$this->load->helper(array('url','html','form','download'));
		$this->load->library('form_validation');
		$this->load->library('session');      
        $this->load->model('AgendaM');
        
        if ($this->session->userdata('username')=="") {
			echo "<script>alert('Session telah habis!');
                    window.location.href='".base_url('login')."';
                </script>";
		}
		date_default_timezone_set("Asia/Jakarta"); 
	}

	public function daftarAgenda()
	{
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');

		$data['judulHeader'] 	= 'Data Agenda';
		$data['hirarki_menu'] 	= 'agenda';
		$data['menu'] 			= 'list agenda';
	 	
	 	$data['data'] 	= $this->AgendaM->tampilDataAgenda();
		$this->template->display('agenda/daftarAgenda',$data);
	}

	public function index($id=NULL)
	{
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');

		$data['judulHeader'] 	= 'Data Agenda';
		$data['hirarki_menu'] 	= 'agenda';
		$data['menu'] 			= 'list agenda';
	 	
	 	$data['data'] 	= $this->AgendaM->tampilDataAgenda();
		$this->template->display('agenda/admin',$data);
	}

	public function tambah()
	{
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');
		$data['judulHeader'] 	= 'Tambah Agenda';
		$data['hirarki_menu'] 	= 'agenda';
		$data['menu'] 			= 'tambah agenda';

		$this->template->display('agenda/tambah',$data);
	}

	public function insert()
	{
		$status = '';
		$message = '';
		$jenis = $this->input->post('jenis');
		$tanggal = strtotime($this->input->post('tanggal'));
		$time = strtotime($this->input->post('waktu'));
		$isi = $this->input->post('isi');
		$tgl = date("Y-m-d",$tanggal);
		$wktu = date("h:i:s",$time);
		$fusion = $tgl.' '.$wktu;
		$object = array(
			'jenis_agenda'=>$jenis,
			'tanggal_agenda'=>$fusion,
			'isi_agenda'=>$isi
		);
		//echo $fusion;
		$insert = $this->AgendaM->insert($object);
		
		if($insert){
			$status = 'berhasil';
		}

		if($status == 'berhasil'){
			$idagenda = $this->db->insert_id();
			$row = $this->db->query("SELECT id_penghuni FROM user_pemakai WHERE id_penghuni IS NOT NULL")->result();
			foreach($row as $x)
			{
			$obj2 = array(
				'id_penghuni' => $x->id_penghuni,
				'id_agenda' =>  $idagenda,
			);
			$this->db->insert('notifikasi_agenda',$obj2);
			}

			$message = array('message'=>'Data Agenda berhasil disimpan', 'class'=>'alert alert-success fade in');
			$this->session->set_flashdata('item', $message);
		}else{
			$message = array('message'=>'Data Agenda gagal disimpan', 'class'=>'alert alert-error fade in');
			$this->session->set_flashdata('item', $message);			
		}
		$this->session->keep_flashdata('item',$message);
		redirect('Agenda');
	}

	public function hapus($id)
	{
		$message = '';

		$hapus = $this->AgendaM->delete($id);
		
		if($this->db->affected_rows()){
			$message = array('message'=>'Data Agenda berhasil dihapus', 'class'=>'alert alert-success fade in');
			$this->session->set_flashdata('item', $message);
		}else{
			$message = array('message'=>'Data Agenda gagal dihapus', 'class'=>'alert alert-error fade in');
			$this->session->set_flashdata('item', $message);			
		}
		$this->session->keep_flashdata('item',$message);
		redirect('agenda');
	}

	public function edit($id = null)
	{		
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');
        
		$data['judulHeader'] 	= 'Ubah Agenda';
		$data['hirarki_menu'] 	= 'agenda';
		$data['menu'] 			= 'ubah agenda';

		$data['editdata'] 		= $this->db->get_where('Agenda',array('id_agenda'=>$id))->row();
		$this->template->display('agenda/edit',$data);
	}

	public function update()
	{
		$message = '';

		$id = $this->input->post('id_agenda');
		$jenis = $this->input->post('jenis');
		$tanggal = strtotime($this->input->post('tanggal'));
		$time = strtotime($this->input->post('waktu'));
		$isi = $this->input->post('isi');
		$tgl = date("Y-m-d",$tanggal);
		$wktu = date("h:i:s",$time);
		$fusion = $tgl.' '.$wktu;
		$object = array(
			'jenis_agenda'=>$jenis,
			'tanggal_agenda'=>$fusion,
			'isi_agenda'=>$isi
		);

		$this->db->where('id_agenda', $id);
		$this->db->update('agenda', $object);

		if($this->db->affected_rows()){
			$message = array('message'=>'Data Agenda berhasil diubah', 'class'=>'alert alert-success fade in');
			$this->session->set_flashdata('item', $message);
		}else{
			$message = array('message'=>'Data Agenda gagal diubah', 'class'=>'alert alert-error fade in');
			$this->session->set_flashdata('item', $message);			
		}
		$this->session->keep_flashdata('item',$message);
		redirect('agenda');
	}

}

/* End of file Role.php */
/* Location: ./application/controllers/Role.php */