<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Template');
        $this->load->helper(array('form','url'));       
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('UserPemakaiM');
        $this->load->model('RoleM');
    }

    public function index() {
        $data['id_user']        = $this->session->userdata('id_user');
        $data['id_penghuni']    = $this->session->userdata('id_penghuni');
        $data['id_role']        = $this->session->userdata('id_role');
        $data['username']       = $this->session->userdata('username');
        $data['nama_role']      = $this->session->userdata('nama_role');
        $data['photo']          = $this->session->userdata('photo');

        $data['judulHeader']    = 'Login Pemakai';
        $data['menu']           = 'login';
        $data['hirarki_menu']   = 'login';

        $this->template->displayLogin('login/login',$data);
    }


    public function cek_login() {
        $data['judulHeader']    = 'Batu Indah Regency';
        $data['menu']           = 'Login';
        $data['hirarki_menu']   = 'Login';

        $user_aktif = false;
        $data = array(
            'username' => $this->input->post('username', TRUE),
            'password' => $this->input->post('password', TRUE),
        );
        $this->load->model('UserPemakaiM'); // load model_user
        $hasil = $this->UserPemakaiM->cek_user_login($data);
        if ($hasil->num_rows() == 1) {
            foreach ($hasil->result() as $sess) {
                $sess_data['login']     = 'Sudah Login';
                $sess_data['id_user']   = $sess->id_user_pemakai;
                $sess_data['id_penghuni']  = $sess->id_penghuni;
                $sess_data['id_role']  = $sess->id_role;
                $sess_data['username']  = $sess->username;
                $sess_data['nama_role'] = $sess->nama_role;
                $sess_data['photo']     = $sess->photo;
                $this->session->set_userdata($sess_data);
                if($sess->is_aktif == true){
                    $user_aktif = true;
                }else{
                    $user_aktif = false;
                }
            }
            if($user_aktif == true){
                 redirect('/dashboard');      
            }else{
                echo "<script>alert('Username telah di Suspend/tidak aktif, Silahkan hubungi Administrator');history.go(-1);</script>";
            }   
        }
        else {
            echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
        }
    }

    public function logout() {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('id_guru');
        $this->session->unset_userdata('id_orangtua');
        $this->session->unset_userdata('nama_role');
        session_destroy();
        redirect('Login');
    }
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */