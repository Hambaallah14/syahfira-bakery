<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cetak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_Model');
        $this->load->model('MakanandanMinuman_Model');
        $this->load->model('Bahanbaku_Model');
        $this->load->model('Jenis_Model');

        if (!$this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
        }
    }

    public function daftar_barang($object)
    {
        $data['title']             = "Makanan dan Minuman - Syahfira Bakery & Cake";
        $data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['makanan_minuman']   = $this->MakanandanMinuman_Model->all();
        $data['bahan_baku']        = $this->Bahanbaku_Model->all();
        $data['jenis']             = $this->Jenis_Model->all();

        if ($object == "makanan_dan_minuman") {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');

            $this->load->view('template/footer');
        } else {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');

            $this->load->view('template/footer');
        }
    }
}
