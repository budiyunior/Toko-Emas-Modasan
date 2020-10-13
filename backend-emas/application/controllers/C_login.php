<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Login extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('admin/login', $data);
    }

    public function proses_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        foreach ($this->M_login->iduser($username) as $row) {
            $iduser = $row->id_user;
            $username = $row->username;
            $jabatan = $row->id_jabatan;
        }
        $where = array(
            'username' => $username,
            'password' => $password
        );
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date('Y-m-d H:i:s');
        $cek = $this->M_login->cek_login("user", $where)->num_rows();
        if ($cek > 0) {
            if ($jabatan == 1) {
                $data_session = array(
                    'username' => $username,
                    'iduser' => $iduser,
                    'status' => 'admin',
                    'jabatan' => 1,
                );
                $this->M_login->gantitgl($tgl, $iduser);
                $this->session->set_userdata($data_session);
                redirect('Beranda');
            } else if ($jabatan == 2) {
                $data_session = array(
                    'username' => $username,
                    'iduser' => $iduser,
                    'status' => 'admin',
                    'jabatan' => 2,
                );
                $this->M_login->gantitgl($tgl, $iduser);
                $this->session->set_userdata($data_session);
                redirect('Beranda');
            } else if ($jabatan == 3) {
                $data_session = array(
                    'username' => $username,
                    'iduser' => $iduser,
                    'status' => 'admin',
                    'jabatan' => 3,
                );
                $this->M_login->gantitgl($tgl, $iduser);
                $this->session->set_userdata($data_session);
                redirect('Beranda');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password anda salah!</div>');
            redirect('Login');
        }
    }
}
