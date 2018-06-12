<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Template');
		$this->load->helper(array('url','html','form','download'));
		$this->load->library('form_validation');
		$this->load->library('session');      
        $this->load->model('SuratM');
        
        if ($this->session->userdata('username')=="") {
			echo "<script>alert('Session telah habis!');
                    window.location.href='".base_url('login')."';
                </script>";
		}
	}

	public function print($id=NULL)
	{
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');

		$data['judulHeader'] 	= 'Data Role';
		$data['hirarki_menu'] 	= 'master_user';
		$data['menu'] 			= 'role';
	 	
	 	$doto = $this->SuratM->getSurat($id)->result();
	 	foreach($doto as $r){
	 		if($r->id_anggota == NULL){
	 			$data['data'] = $this->SuratM->getSuratPenghuni($r->id_surat)->result();
	 			$this->db->where('id_surat',$r->id_surat);
	 			$this->db->update('pengajuan_surat',array('is_cetak' => '1'));
	 		}else{
	 			$data['data'] = $this->SuratM->getSuratAnggota($r->id_surat)->result();
	 			$this->db->where('id_surat',$r->id_surat);
	 			$this->db->update('pengajuan_surat',array('is_cetak' => '1'));
	 		}
	 	}
	 	
		$this->load->view('surat/cetak',$data);
	}

		public function insert()
	{
		$status = '';
		$message = '';

		$subjek = $this->input->post('subjek');
		$isi = $this->input->post('isi');
		$ket = $this->input->post('ket');

		if($subjek == 'Penghuni'){
		$object = array(
			'id_penghuni'=>  $this->session->userdata('id_penghuni'),
			'isi_surat'=>$isi,
			'keterangan'=> $ket,
			'tanggal_surat'=> date('Y-m-d'),
			'is_cetak' => 0
		);
		}else{
		$object = array(
			'id_penghuni'=>  $this->session->userdata('id_penghuni'),
			'id_anggota'=>   $this->input->post('anggota'),
			'isi_surat'=>$isi,
			'keterangan'=>$ket,
			'tanggal_surat'=> date('Y-m-d'),
			'is_cetak' => 0
		);
		}


		$insert = $this->SuratM->insert($object);
		
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
		redirect('Surat/Pengajuan');
	}


	public function pengajuan(){
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');

		$data['judulHeader'] 	= 'Data Pengajuan';
		$data['hirarki_menu'] 	= 'pengajuan';
		$data['menu'] 			= 'pengajuan';
	 	
	 	$data['peng'] = $this->SuratM->getAnggota($this->session->userdata('id_penghuni'))->result_object();
		$this->template->display('surat/pengajuan',$data);
	}

	public function daftarPengajuan(){
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');

		$data['judulHeader'] 	= 'Data Pengajuan';
		$data['hirarki_menu'] 	= 'pengajuan';
		$data['menu'] 			= 'pengajuan_surat';
	 	$data['data'] = $this->db->query("SELECT * FROM pengajuan_surat WHERE is_cetak = '0'")->result();
		$this->template->display('surat/daftarPengajuan',$data);
	}


}

/* End of file Role.php */
/* Location: ./application/controllers/Role.php */