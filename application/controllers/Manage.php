<?php defined('BASEPATH') or exit('No direct script access allowed');

class Manage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        //cek_login();//
    }

    public function index()
    {
        $data['judul'] = 'Manage Project';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['anggota'] = $this->ModelUser->getUserLimit()->result_array();
        $data['buku'] = $this->ModelBuku->getBuku()->result_array();
        $this->load->view('templates/header', $data);

        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('manage/index', $data);
        $this->load->view('templates/footer');
    }

}