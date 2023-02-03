<?php
defined('BASEPATH') or exit('No direct script access allowed');
class transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Barang_Model');
        $this->load->model('Transaksi_Model');
        $this->load->model('User_Model');
        if (!$this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
        }
    }

    // MAKANAN DAN MINUMAN
    public function persediaan_barang($object)
    {
        if ($object == "makanandanminuman") {
            $data['title']           = "Persediaan Makanan dan Minuman - Syahfira Bakery & Cake";
            $data['user']            = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
            var_dump($data["user"][0]["h_akses"]);
        } else if ($object == "bahan_baku") {
            $data['title']                  = "Persediaan Bahan Baku - Syahfira Bakery & Cake";
            $data['user']            = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        }
    }







    // BAHAN BAKU
}
