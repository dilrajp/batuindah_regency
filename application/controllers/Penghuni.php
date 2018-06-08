<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penghuni extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Template');
		$this->load->helper(array('url','html','form','download'));
		$this->load->library('form_validation');
		$this->load->library('session');      
        $this->load->model('PenghuniM');
        $this->load->model('AnggotaKeluargaM');
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

		$data['judulHeader'] 	= 'Data Penghuni';
		$data['hirarki_menu'] 	= 'master_data';
		$data['menu'] 			= 'penghuni';
	 	
	 	$data['data'] 	= $this->PenghuniM->tampilDataPenghuni();
		$this->template->display('penghuni/admin',$data);
	}

	public function datapenghuni($id=NULL)
	{
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');

		$data['judulHeader'] 	= 'Data Penghuni';
		$data['hirarki_menu'] 	= 'View ';
		$data['menu'] 			= 'Data Penghuni';
	 	
	 	$data['data'] 	= $this->PenghuniM->dataDiri( $this->session->userdata('id_penghuni'));
	 	$data['anggota'] 	= $this->PenghuniM->dataAnggota( $this->session->userdata('id_penghuni'));
		$this->template->display('penghuni/datadiri',$data);
	}

	public function tambah()
	{
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');

		$data['judulHeader'] 	= 'Tambah Penghuni';
		$data['hirarki_menu'] 	= 'master_data';
		$data['menu'] 			= 'penghuni';

		$data['rumah'] 			= $this->RumahM->tampilDataRumah();
		$this->template->display('penghuni/tambah',$data);
	}

	public function insert()
	{
		$status = '';
		$status_detail_keluarga = 'berhasil';
		$message = '';

		$id_rumah = $this->input->post('id_rumah');
		$nama_pemilik = $this->input->post('nama_pemilik');

		$nama_penghuni = $this->input->post('nama_penghuni');
		$alamat_lengkap = $this->input->post('alamat_lengkap');
		$no_ktp = $this->input->post('no_ktp');
		$status_penghuni = $this->input->post('status_penghuni');
		$pekerjaan = $this->input->post('pekerjaan');
		$no_telepon = $this->input->post('no_telepon');
		$jml_anggota_keluarga = $this->input->post('jml_anggota_keluarga');
		$jeniskelamin = $this->input->post('jeniskelamin');
		$status_dikeluarga = $this->input->post('status_dikeluarga');
		$is_aktif  = true;

		$anggota = $_POST['anggota'];

		$object = array(
			'id_rumah'=>$id_rumah,
			'no_ktp'=>$no_ktp,
			'nama_penghuni'=>$nama_penghuni,
			'status_penghuni'=>$status_penghuni,
			'jeniskelamin'=>$jeniskelamin,
			'pekerjaan'=>$pekerjaan,
			'no_telepon'=>$no_telepon,
			'jml_anggota_keluarga'=>$jml_anggota_keluarga,
			'status_dikeluarga'=>$status_dikeluarga,
			'is_aktif'=>$is_aktif
		);

		$insert = $this->PenghuniM->insert($object);
		
		if($insert){
			//update data rumah
		 
			$status = 'berhasil';
            if(count($anggota) > 0){
                foreach($anggota as $i=>$data){
                    $this->db->from('penghuni');
                    $this->db->order_by("id_penghuni", "DESC");
                    $this->db->limit(1);
                    $data_penghuni = $this->db->get(); 
                    $data_penghuni = $data_penghuni->row();
                    $id_penghuni = isset($data_penghuni) ? $data_penghuni->id_penghuni : null;


	                $rumah = array(
	                'id_penghuni' => $data_penghuni->id_penghuni,
	                );

					$this->db->where('id_rumah', $data_penghuni->id_rumah);
					$this->db->update('rumah', $rumah);


                    $nama = $data['nama'];
                    $no_ktp = $data['no_ktp'];
                    $jeniskelamin = $data['jeniskelamin'];
                    $tempat_lahir = $data['tempat_lahir'];
                    $tanggal_lahir = $data['tanggal_lahir'];
                    $tgl_lahir = explode('-',$tanggal_lahir);
                    $tanggal_lahir = $tgl_lahir[2].'-'.$tgl_lahir[1].'-'.$tgl_lahir[0];
                    $tanggal_lahir = $tanggal_lahir;
                    $status = $data['status'];

                    $object_detail_anggota = array(
                        'id_penghuni'=>$id_penghuni,
                        'nama'=>$nama,
                        'jeniskelamin'=>$jeniskelamin,
                        'status'=>$status,
                        'tempat_lahir'=>$tempat_lahir,
                        'tanggal_lahir'=>$tanggal_lahir,
                        'no_ktp'=>$no_ktp
                    );
                    $insert_detail_anggota = $this->AnggotaKeluargaM->insert($object_detail_anggota);
                    if($insert_detail_anggota){
                    	$status_detail_keluarga = 'berhasil';
                    }else{
                    	$status_detail_keluarga = 'gagal';
                    }
                }
            }			
		}

		if($status == 'berhasil' && $status_detail_keluarga == 'berhasil'){
			$message = array('message'=>'Data berhasil disimpan', 'class'=>'alert alert-success fade in');
			$this->session->set_flashdata('item', $message);
		}else{
			$message = array('message'=>'Data gagal disimpan', 'class'=>'alert alert-error fade in');
			$this->session->set_flashdata('item', $message);			
		}
		$this->session->keep_flashdata('item',$message);
		redirect('penghuni');
	}

	public function hapus($id)
	{
		$message = '';

		$hapus = $this->PenghuniM->delete($id);
		
		if($this->db->affected_rows()){
			$message = array('message'=>'Data berhasil dihapus', 'class'=>'alert alert-success fade in');
			$this->session->set_flashdata('item', $message);
		}else{
			$message = array('message'=>'Data gagal dihapus', 'class'=>'alert alert-error fade in');
			$this->session->set_flashdata('item', $message);			
		}
		$this->session->keep_flashdata('item',$message);
		redirect('Penghuni');
	}

	public function edit($id = null)
	{		
		$data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');
        
		$data['judulHeader'] 	= 'Ubah Data Penghuni';
		$data['hirarki_menu'] 	= 'master_data';
		$data['menu'] 			= 'penghuni';

		$data['editdata'] 		= $this->db->get_where('penghuni',array('id_penghuni'=>$id))->row();
		$id_rumah 				= isset($data['editdata']) ? $data['editdata']->id_rumah : null;
		$data['data_rumah']     = $this->db->get_where('rumah',array('id_rumah'=>$id_rumah))->row();
		$data['detail_anggota'] = $this->db->get_where('anggota_keluarga',array('id_penghuni'=>$id))->result_object();
		$data['rumah'] 			= $this->RumahM->tampilDataRumah();
		$this->template->display('penghuni/edit',$data);
	}

	public function update()
	{
		$message = '';

		$id_penghuni = $this->input->post('id_penghuni');
		$id_rumah = $this->input->post('id_rumah');
		$nama_penghuni = $this->input->post('nama_penghuni');
		$status_penghuni = $this->input->post('status_penghuni');
		$jeniskelamin = $this->input->post('jeniskelamin');
		$pekerjaan = $this->input->post('pekerjaan');
		$no_telepon = $this->input->post('no_telepon');
		$jml_anggota_keluarga = $this->input->post('jml_anggota_keluarga');

		$object = array(
			'id_rumah'=>$id_rumah,
			'nama_penghuni'=>$nama_penghuni,
			'status_penghuni'=>$status_penghuni,
			'jeniskelamin'=>$jeniskelamin,
			'pekerjaan'=>$pekerjaan,
			'no_telepon'=>$no_telepon,
			'jml_anggota_keluarga'=>$jml_anggota_keluarga,
		);

		$this->db->where('id_penghuni', $id_penghuni);
		$this->db->update('penghuni', $object);

		if($this->db->affected_rows()){
			$message = array('message'=>'Data berhasil diubah', 'class'=>'alert alert-success fade in');
			$this->session->set_flashdata('item', $message);
		}else{
			$message = array('message'=>'Data gagal diubah', 'class'=>'alert alert-error fade in');
			$this->session->set_flashdata('item', $message);			
		}
		$this->session->keep_flashdata('item',$message);
		redirect('Penghuni');
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

		$this->db->where('id_penghuni', $id);
		$this->db->update('penghuni', $object);

		if($this->db->affected_rows()){
			$message = array('message'=>'Data berhasil di-aktif/non-aktif kan', 'class'=>'alert alert-success fade in');
			$this->session->set_flashdata('item', $message);
		}else{
			$message = array('message'=>'Data gagal di-aktif/non-aktif kan', 'class'=>'alert alert-error fade in');
			$this->session->set_flashdata('item', $message);			
		}
		$this->session->keep_flashdata('item',$message);
		redirect('Penghuni');
	}

	public function setFormKeluarga(){
		$data['tr'] = '';
		$data['tr'] .= '<tr>';
		$data['tr'] .= '<td><input id="anggota_0_nama" name="anggota[0][nama]" type="text" class="form-control" required></td>';
		$data['tr'] .= '<td><input id="anggota_0_no_ktp" name="anggota[0][no_ktp]" type="text" class="form-control numbers-only"></td>';
		$data['tr'] .= '<td><select id="anggota_0_jeniskelamin" name="anggota[0][jeniskelamin]" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <option value="LAKI-LAKI">LAKI-LAKI</option>
                                        <option value="PEREMPUAN">PEREMPUAN</option>
                                    </select></td>';
		$data['tr'] .= '<td><textarea id="anggota_0_tempat_lahir" name="anggota[0][tempat_lahir]" class="form-control"></textarea></td>';
		$data['tr'] .= '<td><input id="anggota_0_tanggal_lahir" name="anggota[0][tanggal_lahir]" type="text" class="form-control datepicker"></td>';
		$data['tr'] .= '<td><select id="anggota_0_status" name="anggota[0][status]" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                        <option value="Anak">Anak</option>
                                        <option value="Kerabat">Kerabat</option>
                                    </select></td>';
		$data['tr'] .= '<td><a href="javascript:tambahKeluarga(this);"><button onclick="tambahKeluarga();" id="tambahKeluarga" type="button" class="btn btn-small btn-success"><i class="entypo-plus"></i></button></a> <br><br><a href="javascript:hapusKeluarga(this);"><button type="button" class="btn btn-small btn-danger" onClick="hapusKeluarga(this);"><i class="entypo-minus"></i></button></a></td>';
		$data['tr'] .= '</tr>';
		echo json_encode($data); 
		exit;
	}
}

/* End of file Penghuni.php */
/* Location: ./application/controllers/Penghuni.php */