<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class transaksi extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('Barang_Model');
        $this->load->model('Transaksi_Model');
		$this->load->model('User_Model');
		if (! $this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
        }
	}

    // <!-- PERSEDIAAN BARANG -->
    public function persediaan_barang(){
        $data['title'] 	  	       = "Persediaan Barang - Syahfira Bakery & Cake";
        $data['persediaan_barang'] = $this->Transaksi_Model->all_persediaan_barang();
        $data['daftar_barang']     = $this->Barang_Model->all_daftar_barang();

        $this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('transaksi/persediaan_barang/index');
        $this->load->view('template/footer');
    }

    // <!-- END PERSEDIAAN BARANG -->
    

    // <!-- BARANG KELUAR -->
    public function barang_keluar(){
        $data['title'] 	  	       = "Barang Keluar - Syahfira Bakery & Cake";

        $this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('transaksi/barang_keluar/index');
        $this->load->view('template/footer');
    }

    // <!-- END BARANG KELUAR -->
    

    // <!-- BARANG TERJUAL -->
    public function barang_terjual(){
        $data['title'] 	  	       = "Barang Terjual - Syahfira Bakery & Cake";

        $this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('transaksi/barang_terjual/index');
        $this->load->view('template/footer');
    }

    // <!-- END BARANG TERJUAL -->


    // <!-- BARANG SISA -->
    public function barang_sisa(){
        $data['title'] 	  	       = "Barang Sisa - Syahfira Bakery & Cake";

        $this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('transaksi/barang_sisa/index');
        $this->load->view('template/footer');
    }

    // <!-- END BARANG SISA -->

}
?>