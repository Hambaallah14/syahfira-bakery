<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Bahan_baku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('User_Model');
        $this->load->model('Bahanbaku_Model');

        if (!$this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
        }
    }

    public function index()
    {
        $data['title']             = "Bahan Baku - Syahfira Bakery & Cake";
        $data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['bahan_baku']        = $this->Bahanbaku_Model->all();
        $data['kode_bahan_baku']   = $this->Bahanbaku_Model->kode();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('bahan_baku/master/index');
        $this->load->view('template/footer');
    }
}
