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

    // <!-- PERSEDIAAN BARANG -->
    public function persediaan_barang($object)
    {

        if ($object == "bahan_baku") {
            $data['title']                  = "Persediaan Bahan Baku - Syahfira Bakery & Cake";
            $data['user']                   = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
            $data['persediaan_barang']      = $this->Transaksi_Model->all_persediaan_barang_bahan_baku();
            $data['daftar_barang']          = $this->Barang_Model->all_daftar_barang_bahan_baku();
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('transaksi/persediaan_barang/bahan_baku');
            $this->load->view('template/footer');
        } else {
            $data['title']                  = "Persediaan Makanan dan Minuman - Syahfira Bakery & Cake";
            $data['user']                   = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
            $data['persediaan_barang']      = $this->Transaksi_Model->all_persediaan_barang_makanandanminuman();
            $data['daftar_barang']          = $this->Barang_Model->all_daftar_barang_makanandanminuman();
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('transaksi/persediaan_barang/makanandanminuman');
            $this->load->view('template/footer');
        }
    }

    public function cariBarang()
    {
        $id_barang = $this->input->post('id_barang', true);
        $data['harga'] = $this->Transaksi_Model->cariBarang($id_barang);
        $this->load->view('transaksi/persediaan_barang/cariBarang', $data);
    }

    public function add_persediaan_barang($object)
    {
        $data['title']                 = "Persediaan Barang - Syahfira Bakery & Cake";
        $this->form_validation->set_rules('id_user', 'id_user', 'required');
        $this->form_validation->set_rules('id_barang', 'id_barang', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('tgl-transaksi', 'tgl-transaksi', 'required');
        $this->form_validation->set_rules('tgl-expired', 'tgl-expired', 'required');
        $this->form_validation->set_rules('qty', 'qty', 'required');
        $this->form_validation->set_rules('ket', 'ket', 'required');

        if ($object == "makanandanminuman") {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('transaksi/persediaan_barang/index');
                $this->load->view('template/footer');
            } else {
                $this->Transaksi_Model->add_persediaan_barang();
                $this->session->set_flashdata('makanandanminuman', 'Disimpan');
                redirect('transaksi/persediaan_barang/makanandanminuman');
            }
        } else {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar');
                $this->load->view('transaksi/persediaan_barang/index');
                $this->load->view('template/footer');
            } else {
                $this->Transaksi_Model->add_persediaan_barang();
                $this->session->set_flashdata('bahan_baku', 'Disimpan');
                redirect('transaksi/persediaan_barang/bahan_baku');
            }
        }
    }

    public function delete_persediaan_barang($id_transaksi)
    {
        $this->Transaksi_Model->delete_persediaan_barang($id_transaksi);
        $this->session->set_flashdata('makanandanminuman', 'Dihapus');
        redirect('transaksi/persediaan_barang/makanandanminuman');
    }

    public function pindai_stok($statusBarang, $idTransaksi)
    {
        if ($statusBarang == "barang_sisa") {
            $data['title']                  = "Input Barang Sisa - Syahfira Bakery & Cake";
            $data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
            $data['persediaan_barang'] = $this->Transaksi_Model->all_persediaan_barang_by_idTransaksi($idTransaksi);

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('transaksi/persediaan_barang/pindaiStokkeBarangSisa');
            $this->load->view('template/footer');
        } else {
            $data['title']                  = "Input Status Barang - Syahfira Bakery & Cake";
            $data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
            $data['persediaan_barang'] = $this->Transaksi_Model->all_persediaan_barang_by_idTransaksi($idTransaksi);

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('transaksi/persediaan_barang/pindaiStokBarang');
            $this->load->view('template/footer');
        }
    }

    public function add_status_barang()
    {
        $data['title']                 = "Persediaan Barang - Syahfira Bakery & Cake";
        $this->form_validation->set_rules('id_user', 'id_user', 'required');
        $this->form_validation->set_rules('id-transaksi', 'id-transaksi', 'required');
        $this->form_validation->set_rules('pilih-menu', 'pilih-menu', 'required');
        $this->form_validation->set_rules('id-barang', 'id-barang', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('new-qty', 'new-qty', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('transaksi/persediaan_barang/index');
            $this->load->view('template/footer');
        } else {
            $this->Transaksi_Model->add_status_barang();
            $this->session->set_flashdata('pindaistokbrg', 'Disimpan');
            redirect('transaksi/persediaan_barang/makanandanminuman');
        }
    }

    // <!-- END PERSEDIAAN BARANG -->


    // <!-- BARANG KELUAR -->
    public function barang_keluar()
    {
        $data['title']                  = "Barang Keluar - Syahfira Bakery & Cake";
        $data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['barang_keluar']     = $this->Transaksi_Model->all_barang_keluar();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/barang_keluar/index');
        $this->load->view('template/footer');
    }

    // <!-- END BARANG KELUAR -->


    // <!-- BARANG TERJUAL -->
    public function barang_terjual()
    {
        $data['title']                  = "Barang Terjual - Syahfira Bakery & Cake";
        $data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['barang_terjual']    = $this->Transaksi_Model->all_barang_terjual();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/barang_terjual/index');
        $this->load->view('template/footer');
    }

    // <!-- END BARANG TERJUAL -->


    // <!-- BARANG SISA -->
    public function barang_sisa()
    {
        $data['title']                  = "Barang Sisa - Syahfira Bakery & Cake";
        $data['user']              = $this->User_Model->user_by_iduser($this->session->userdata('id_user'));
        $data['barang_sisa']       = $this->Transaksi_Model->all_barang_sisa();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/barang_sisa/index');
        $this->load->view('template/footer');
    }


    public function add_barang_sisa()
    {
        $data['title']                 = "Persediaan Barang - Syahfira Bakery & Cake";
        $this->form_validation->set_rules('tanggal_transaksi', 'tanggal_transaksi', 'required');
        $this->form_validation->set_rules('id-transaksi', 'id-transaksi', 'required');
        $this->form_validation->set_rules('id-barang', 'id-barang', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');
        $this->form_validation->set_rules('qty', 'qty', 'required');
        $this->form_validation->set_rules('id_user', 'id_transaksi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('transaksi/persediaan_barang/index');
            $this->load->view('template/footer');
        } else {
            $this->Transaksi_Model->add_barang_sisa();
            $this->session->set_flashdata('pindaistokbrgsisa', 'Disimpan');
            redirect('transaksi/persediaan_barang/makanandanminuman');
        }
    }

    // <!-- END BARANG SISA -->

}
