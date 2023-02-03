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
            if ($data["user"][0]["h_akses"] == "admin") {
                $data['daftar_user']        = $this->User_Model->all_data();
                $data['persediaan_barang']  = $this->Transaksi_Model->all_persediaan_barang_bahan_baku();
                $data['daftar_barang']      = $this->Barang_Model->all_daftar_barang_bahan_baku();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('transaksi/persediaan_barang/admin/makanan_minuman');
                $this->load->view('template/footer');
            } else {
            }
        } else if ($object == "bahan_baku") {
            $data['title']                  = "Persediaan Bahan Baku - Syahfira Bakery & Cake";
            $data['user']            = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
            if ($data["user"][0]["h_akses"] == "admin") {
                $data['daftar_user']       = $this->User_Model->all_data();
                $data['persediaan_barang'] = $this->Transaksi_Model->all_persediaan_barang_makanandanminuman();
                $data['daftar_barang']     = $this->Barang_Model->all_daftar_barang_makanandanminuman();
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('transaksi/persediaan_barang/admin/bahan_baku');
                $this->load->view('template/footer');
            } else {
            }
        }
    }







    // BAHAN BAKU
}
